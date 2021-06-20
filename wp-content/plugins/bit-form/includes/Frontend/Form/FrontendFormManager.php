<?php

/**
 * Get set Form,fields
 */

namespace BitCode\BitForm\Frontend\Form;

/**
 * FrontendFormManager class
 */

use WP_Error;
use BitCode\BitForm\Core\Util\IpTool;
use BitCode\BitForm\Core\Util\HttpHelper;
use BitCode\BitForm\Core\Form\FormManager;
use BitCode\BitForm\Core\Util\DateTimeHelper;
use BitCode\BitForm\Core\Database\FormEntryModel;
use BitCode\BitForm\Frontend\Form\View\FormViewer;
use BitCode\BitForm\Core\WorkFlow\WorkFlowRunHelper;
use BitCode\BitForm\Core\Integration\IntegrationHandler;
use BitCode\BitForm\Core\Form\Validator\FormFieldValidator;
use BitCode\BitForm\Core\Util\ApiResponse as UtilApiResponse;

final class FrontendFormManager extends FormManager
{
    private $_form_identifier;
    private $_form_token;
    private $_form_id;
    // private $_has_upload = false;
    public function __construct($form_id, $shortCodeCounter = null)
    {
        parent::__construct($form_id);
        $this->_form_identifier = 'bitforms_' . $form_id . '_submit_';
        $this->_form_identifier .= !empty(get_post()->ID) ? get_post()->ID : '';
        $this->_form_identifier .= !empty($shortCodeCounter) ? "_$shortCodeCounter" : '';
        $this->_form_token = wp_create_nonce('bitforms_' . $form_id);
        $this->_form_id = $form_id;
    }

    public function getFormIdentifier()
    {
        return $this->_form_identifier;
    }

    public function getFormID()
    {
        return $this->_form_id;
    }

    public function getFormToken()
    {
        return $this->_form_token;
    }

    public function isSubmitted()
    {
        return isset($_POST[$this->_form_identifier]) ? true : false;
    }

    public function getSubmittedFields($submitted_data)
    {
        unset($submitted_data[$this->_form_identifier]);
        return array_keys($submitted_data);
    }

    public function formView($fields = null, $hasFile = false, $errorMessages = null, $previousValue = null)
    {
        $formContents = $this->getFormContent();
        if (!empty($fields)) {
            $formContents->fields = is_string($fields) ? json_decode($fields) : $fields;
        } else {
            $workFlowRunHelper = new WorkFlowRunHelper($this->form_id);
            $workFlowreturnedOnLoad = $workFlowRunHelper->executeOnLoad(
                'create',
                $formContents->fields
            );
            $formContents->fields = empty($workFlowreturnedOnLoad['fields']) ? $formContents->fields : $workFlowreturnedOnLoad['fields'];
        }
        $formViewer = new FormViewer($this, $formContents, $errorMessages, $previousValue);
        return $formViewer->getView($hasFile);
    }


    public function handleSubmission()
    {
        if ($this->verifySubmissionNonce()) {
            if ($this->isExist()) {
                $isRestricted = $this->checkSubmissionRestriction();
                if ($isRestricted && !empty($isRestricted)) {
                    return new WP_Error('spam_detection', $isRestricted[0]);
                }
                if ($this->isTrappedInHoneypot()) {
                    return new WP_Error('spam_detection', __('Token verification failed', 'bitform'));
                }
                $captchaSettings = $this->getCaptchaSettings();
                $captchaV3Settings = $this->getCaptchaV3Settings();
                if ($captchaSettings || $captchaV3Settings) {
                    $token = $_POST['g-recaptcha-response'];
                    if (!isset($_POST['g-recaptcha-response'])) {
                        return new WP_Error('spam_detection', __('Please verify reCAPTCHA', 'bitform'));
                    }
                    $integrationHandler = new IntegrationHandler(0);
                    $allFormIntegrations  = $integrationHandler->getAllIntegration('app', $captchaSettings ? 'gReCaptcha' : 'gReCaptchaV3');
                    if (!is_wp_error($allFormIntegrations)) {
                        foreach ($allFormIntegrations as $integration) {
                            if (!is_null($integration->integration_type) && $integration->integration_type === ($captchaSettings ? 'gReCaptcha' : 'gReCaptchaV3')) {
                                $integrationDetails = json_decode($integration->integration_details);
                                $integrationDetails->id = $integration->id;
                                $reCAPTCHA = $integrationDetails;
                            }
                        }
                    }
                    if (!empty($reCAPTCHA->secretKey)) {
                        $gRecaptchaResponse = HttpHelper::post(
                            'https://www.google.com/recaptcha/api/siteverify',
                            ['secret' => $reCAPTCHA->secretKey, 'response' => $token]
                        );
                        $isgReCaptchaVerified = false;
                        if (!is_wp_error($gRecaptchaResponse)) {
                            if (
                                $captchaV3Settings
                                && !empty($gRecaptchaResponse->score)
                                && ((float) $gRecaptchaResponse->score < (float) $captchaV3Settings->score)
                            ) {
                                wp_send_json_error(
                                    __(
                                        $captchaV3Settings->message,
                                        'bitform'
                                    )
                                );
                            }

                            $isgReCaptchaVerified = $gRecaptchaResponse->success;
                        }
                        if (!$isgReCaptchaVerified) {
                            return new WP_Error('spam_detection', __('Please verify reCAPTCHA', 'bitform'));
                        }
                    }
                }
                unset($_POST['g-recaptcha-response']);
                $validateForm = $this->validateFormSubmission($_POST);
                $form_fields = $this->getFields();
                $formFieldValidator = new FormFieldValidator($form_fields, $_POST, $_FILES);
                $validateField = $formFieldValidator->validate('create', $this->_form_id);
                if ($validateForm && $validateField) {
                    $saveResponse = $this->saveFormEntry($_POST);
                    if (is_wp_error($saveResponse)) {
                        return $saveResponse;
                    }
                    if ($captchaV3Settings && !empty($saveResponse['triggerData'])) {
                        $logID = $saveResponse['triggerData']['logID'];
                        $integId = $reCAPTCHA->id;
                        $saveApiResponse = new UtilApiResponse();
                        $saveApiResponse->apiResponse($logID, $integId, ['type_name' => 'ReCaptcha', 'type' => 'v3'], 'success', $gRecaptchaResponse);
                    }
                    $saveResponse = IntegrationHandler::maybeSetCronForIntegration($saveResponse, 'create');
                    $this->setSubmissionCount();
                    $responseMsg = is_array($saveResponse) && !empty($saveResponse) ? $saveResponse : __('Form Submitted Successfully', 'bitform');
                    $_POST = array();
                    return $responseMsg;
                } else {
                    $error = __('Please submit form with valid fields', 'bitform');
                    if (!$validateForm) {
                        $errorMessages = $error;
                    } else {
                        $errorMessages = count($formFieldValidator->getMessage()) > 0 ?
                            $formFieldValidator->getMessage() : $error;
                    }
                    return new WP_Error('validation_error', $errorMessages);
                }
            }
            return new WP_Error('unknown_form', __('Form does not exist', 'bitform'));
        } else {
            return new WP_Error('token_expired', __('Token expired', 'bitform'));
        }
    }

    public function validateFormSubmission($submitted_data)
    {
        $submitted_fields = $this->getSubmittedFields($submitted_data);
        $form_fields = $this->getFields();
        $form_fields_names = array_keys($form_fields);
        if ($this->isGCLIDEnabled()) {
            array_push($form_fields_names, 'GCLID');
        }
        foreach ($submitted_fields as $key => $field) {
            if (!in_array($field, $form_fields_names)) {
                unset($submitted_data[$field]);
            }
        }
        return $submitted_data;
    }

    public function verifySubmissionNonce()
    {
        if (!isset($_POST['bitforms_token'])) {
            return false;
        }
        $token = sanitize_text_field($_POST['bitforms_token']);
        unset($_POST['_ajax_nonce'], $_POST['action'], $_POST['bitforms_id'], $_POST['bitforms_token']);
        if (!is_user_logged_in()) {
            return true;
        }
        return wp_verify_nonce($token, "bitforms_{$this->form_id}");
    }

    public function setViewCount()
    {
        if (!current_user_can('manage_options')) {
            $update_status =  $this->formModel->update(
                array(
                    'views' => intval(static::$form[0]->views)  + 1
                ),
                array(
                    'id' => $this->form_id
                )
            );
        }
    }

    public function checkSubmissionRestriction()
    {
        $formContents = $this->getFormContent();
        $fromRestrictionSetitingsEnabled = empty($formContents->additional->enabled) ? null : $formContents->additional->enabled;
        $fromRestrictionSetitings = empty($formContents->additional->settings) ? null : $formContents->additional->settings;
        if (is_null($formContents->additional->enabled) || is_null($formContents->additional->settings)) {
            return false;
        }
        $restrictionMessage = array();
        $ipTool = new IpTool();
        $ipAddress = $ipTool->getIP();
        foreach ($fromRestrictionSetitingsEnabled as $restrictionKey => $isEnabled) {
            if ($isEnabled) {
                if ($restrictionKey === 'entry_limit'  && isset($fromRestrictionSetitings->{$restrictionKey})) {
                    $formEntry = new FormEntryModel();
                    $countResult = $formEntry->count(
                        array(
                            'form_id' => $this->form_id
                        )
                    );
                    $count = !empty($countResult[0]) && !empty($countResult[0]->count) ? $countResult[0]->count : false;
                    if ($count && $count >= intval($fromRestrictionSetitings->{$restrictionKey})) {
                        $restrictionMessage[] = __('Sorry!! Entry limit exceeded', "bitform");
                    }
                }
                if ($restrictionKey === 'onePerIp') {
                    $formEntry = new FormEntryModel();
                    $countResult = $formEntry->count(
                        array(
                            'form_id' => $this->form_id,
                            'user_ip' => ip2long($ipAddress)
                        )
                    );
                    $count = !empty($countResult[0]) && !empty($countResult[0]->count) ? $countResult[0]->count : false;

                    if ($count && $count > 0) {
                        $restrictionMessage[] = __('Sorry!! You have already submitted', "bitform");
                    }
                }
                if ($restrictionKey === 'restrict_form'  && isset($fromRestrictionSetitings->{$restrictionKey})) {
                    $day = empty($fromRestrictionSetitings->{$restrictionKey}->day) ? null : $fromRestrictionSetitings->{$restrictionKey}->day;
                    $date = empty($fromRestrictionSetitings->{$restrictionKey}->date) ? null : $fromRestrictionSetitings->{$restrictionKey}->date;
                    $time = empty($fromRestrictionSetitings->{$restrictionKey}->time) ? null : $fromRestrictionSetitings->{$restrictionKey}->time;

                    $isdayOk = $isdateOk = $istimeOk = true;
                    $dayNotOkMsg = $dateNotOkMsg = $timeNotOkMsg = '';
                    $dateTimeHelper = new DateTimeHelper();
                    if (
                        !empty($day)
                        && is_array($day)
                        && (in_array("Friday", $day)
                            || in_array("Saturday", $day)
                            || in_array("Sunday", $day)
                            || in_array("Monday", $day)
                            || in_array("Tuesday", $day)
                            || in_array("Wednesday", $day)
                            || in_array("Thursday", $day))
                        && (!in_array($dateTimeHelper->getDay('full-name'), $day))
                    ) {
                        $isdayOk = false;
                        $dayMsgVarsFormat = '';
                        foreach ($day as $dayIndex => $dayValue) {
                            if ($dayIndex > 0) {
                                $dayMsgVarsFormat .= ', ';
                            }
                            $dayMsgVarsFormat .= '%s';
                        }
                        $dayNotOkMsg = vsprintf(__("in $dayMsgVarsFormat", 'bitform'), $day);
                    }
                    if (
                        !empty($day)
                        && is_array($day)
                        && (in_array("Custom", $day))
                    ) {
                        $startDate = empty($date->from) ? '00-00-0000' : $date->from;
                        $endDate = empty($date->to) ? '00-00-0000' : $date->to;
                        if (!empty($date->from) && strpos($startDate, 'T') !== false) {
                            $startDate = $dateTimeHelper->getDate($startDate, false, null, 'm-d-Y');
                        }
                        if (!empty($date->to) && strpos($endDate, 'T') !== false) {
                            $endDate = $dateTimeHelper->getDate($endDate, false, null, 'm-d-Y');
                        }
                        $currentDate = $dateTimeHelper->getDate(null, null, null, 'm-d-Y');
                        if (!($currentDate >= $startDate && $currentDate <= $endDate)) {
                            $isdateOk = false;
                            $dateNotOkMsg = sprintf(__("within %s to %s", 'bitform'), $startDate, $endDate);
                        }
                    }

                    if (!empty($time)) {
                        $startTime = empty($time->from) ? '00:00' : $time->from;
                        $endTime = empty($time->to) ? '23:59.999' : $time->to;
                        $currentTime = $dateTimeHelper->getTime(null, null, null, 'H:i');
                        if (!($currentTime >= $startTime && $currentTime <= $endTime)) {
                            $istimeOk = false;
                            $startTime = $dateTimeHelper->getTime($startTime, 'H:i', null);
                            $endTime = $dateTimeHelper->getTime($endTime, 'H:i', null);
                            $isTimeOk = false;
                            $timeNotOkMsg = sprintf(__("%s to %s", 'bitform'), $startTime, $endTime);
                        }
                    }

                    if (!($isdateOk && $isdayOk && $istimeOk)) {
                        if (!$isdayOk) {
                            $restrictionMessage[] = !empty($timeNotOkMsg) ? sprintf(__("Form is available %s From %s", 'bitform'), $dayNotOkMsg, $timeNotOkMsg) :
                                sprintf(__("Form is available %s", 'bitform'), $dayNotOkMsg, $timeNotOkMsg);
                        } elseif (!$isdateOk) {
                            $restrictionMessage[] = !empty($timeNotOkMsg) ? sprintf(__("Form is available %s From %s", 'bitform'), $dateNotOkMsg, $timeNotOkMsg) :
                                sprintf(__("Form is available %s", 'bitform'), $dateNotOkMsg, $timeNotOkMsg);
                        } elseif (!$istimeOk) {
                            $restrictionMessage[] = sprintf(__("Form is available on %s", 'bitform'), $timeNotOkMsg);
                        }
                    }
                }
                if ($restrictionKey === 'blocked_ip'  && isset($fromRestrictionSetitings->{$restrictionKey})) {
                    $isIpBlocked = false;
                    foreach ($fromRestrictionSetitings->{$restrictionKey} as $ipIndex => $ipDetails) {
                        if (!empty($ipDetails->status) && $ipDetails->status && !empty($ipDetails->ip) && $ipDetails->ip === $ipAddress) {
                            $isIpBlocked = true;
                            break;
                        }
                    }
                    if ($isIpBlocked) {
                        $restrictionMessage[] = sprintf(__("Sorry!! Your IP address is %s, Blocked from submitting the form", 'bitform'), $ipAddress);
                    }
                }
                if ($restrictionKey === 'private_ip'  && isset($fromRestrictionSetitings->{$restrictionKey})) {
                    $isIpWhiteListed = false;
                    foreach ($fromRestrictionSetitings->{$restrictionKey} as $ipIndex => $ipDetails) {
                        if (!empty($ipDetails->status) && $ipDetails->status && !empty($ipDetails->ip) && $ipDetails->ip === $ipAddress) {
                            $isIpWhiteListed = true;
                            break;
                        }
                    }
                    if (!$isIpWhiteListed) {
                        $restrictionMessage[] = sprintf(__("Sorry!! Your IP address is %s, Blocked from submitting the form", 'bitform'), $ipAddress);
                    }
                }
            }
        }
        return $restrictionMessage;
    }

    public function honeypotTrap()
    {
        if ($this->isHoneypotActive()) {
            $time = \time();
            $token = base64_encode(base64_encode($time.".". wp_hash(wp_get_session_token().$time)));
            $script = "document.addEventListener('DOMContentLoaded',(event)=>{ let frm=document.getElementById('form-{$this->_form_identifier}'),token=document.createElement('input');token.type='hidden',token.name='token',token.value='$token',frm.prepend(token);let nam=document.createElement('input');nam.type='text',nam.className='btcd-hidden',nam.name='{$token}.name',frm.prepend(nam);let em=document.createElement('input');em.type='email',em.className='btcd-hidden',em.name='{$token}.email',frm.prepend(em);let msg=document.createElement('textarea');msg.className='btcd-hidden',msg.name='{$token}.message',frm.prepend(msg);})";
            wp_add_inline_script('bitforms-frontend-script', $script, 'after');
        }
        return;
    }

    /**
     * Will check if form is submitted by a bot
     *
     * @return Boolean true - if submitted by bot else false
     */
    public function isTrappedInHoneypot()
    {
        if (!$this->isHoneypotActive()) {
            return false;
        }

        if (empty($_POST['token'])) {
            return true;
        } else {
            $token = $_POST['token'];
        }

        $dtoken = explode('.', base64_decode(base64_decode($token)))[1];
        $time = explode('.', base64_decode(base64_decode($token)))[0];

        if (time() - $time < 6 || hash_equals($dtoken, wp_hash(wp_get_session_token().$time)) === false) {
            return true;
        }
        if (!empty($_POST[$token.'.name'])
            || !empty($_POST[$token.'_name'])
            || !empty($_POST[$token.'.email'])
            || !empty($_POST[$token.'_email'])
            || !empty($_POST[$token.'.message'])
            || !empty($_POST[$token.'_message'])
        ) {
            return true;
        }
        unset($_POST['token'], $_POST[$token.'name'], $_POST[$token.'email'], $_POST[$token.'message']);
        return false;
    }

    public function isHoneypotActive()
    {
        $formContents = $this->getFormContent();
        $enabled = empty($formContents->additional->enabled) ? null : $formContents->additional->enabled;
        if (!empty($enabled->honeypot) && $enabled->honeypot) {
            return true;
        }
        return false;
    }
}
