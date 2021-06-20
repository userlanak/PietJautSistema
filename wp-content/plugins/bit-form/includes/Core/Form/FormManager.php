<?php

/**
 * Get set Form,fields
 */

namespace BitCode\BitForm\Core\Form;

/**
 * FrontendFormManager class
 */

use WP_Error;
use BitCode\BitForm\Core\Util\IpTool;
use BitCode\BitForm\Core\Form\ApiResponse;
use BitCode\BitForm\Core\Util\FileHandler;
use BitCode\BitForm\Core\Database\FormModel;
use BitCode\BitForm\Core\Database\FormEntryModel;
use BitCode\BitForm\Core\Database\FormEntryLogModel;
use BitCode\BitForm\Core\WorkFlow\WorkFlowRunHelper;
use BitCode\BitForm\Core\Database\FormEntryMetaModel;
use BitCode\BitForm\Core\Form\Validator\FormFieldValidator;
use BitCode\BitForm\Core\Util\ApiResponse as UtilApiResponse;

class FormManager
{
    protected static $form;
    protected $formModel;
    protected $form_id;
    private $_has_upload;
    private $_field_label;
    private $_fields;
    public function __construct($form_id)
    {
        $this->form_id = $form_id;
        $this->formModel = new FormModel();

        static::$form = $this->formModel->get(
            [
                "id",
                "form_content",
                "form_name",
                'created_at',
                'views',
                'entries',
                'status'
            ],
            array(
                'id' => $form_id
            )
        );
    }

    public function isExist()
    {
        return (!static::$form || is_wp_error(static::$form)) ? false : true;
    }

    public function checkStatus()
    {
        return static::$form[0]->status === '1' ? true : false;
    }

    public function getFormContentWithValue($defaultValues)
    {
        $form_content = \json_decode(static::$form[0]->form_content);
        if (!is_array($defaultValues)) {
            return $form_content;
        }
        foreach ($form_content->fields as $fieldKey => $fieldDetails) {
            // $field_name = empty($fieldDetails->lbl) ? null : \preg_replace('/[\`\~\!\@\#\$\'\.\s\?\+\-\*\&\|\/\\!]/', '_', $fieldDetails->lbl);
            if ((isset($fieldDetails->mul) ||  $fieldDetails->typ === 'check') && isset($defaultValues[$fieldKey])) {
                if (is_array($defaultValues[$fieldKey])) {
                    $fieldDetails->val =
                        wp_json_encode(
                            array_map('sanitize_text_field', $defaultValues[$fieldKey])
                        );
                } else {
                    $fieldDetails->val = sanitize_text_field($defaultValues[$fieldKey]);
                }
            } elseif (isset($defaultValues[$fieldKey])) {
                $fieldDetails->val = is_string($defaultValues[$fieldKey]) ?
                    sanitize_text_field($defaultValues[$fieldKey]) :
                    sanitize_text_field($defaultValues[$fieldKey][count($defaultValues[$fieldKey]) - 1]);
            }
        }
        return $form_content;
    }

    public function getFormContent()
    {
        return json_decode(static::$form[0]->form_content);
    }

    public function getFormName()
    {
        return static::$form[0]->form_name;
    }

    public function getFields()
    {
        if (!is_null($this->_fields)) {
            return $this->_fields;
        }
        $form_content = \json_decode(static::$form[0]->form_content);
        $layout = $form_content->layout;
        $fields = $form_content->fields;
        $field_details = array();
        foreach ($fields as $key => $field) {
            if ($field->typ === 'recaptcha') {
                continue;
            }
            // $field_name = empty($field->lbl) ? null : \preg_replace('/[\`\~\!\@\#\$\'\.\s\?\+\-\*\&\|\/\\\!]/', '_', $field->lbl);
            $field_type = $field->typ;
            $field_details[$key]['label'] = empty($field->lbl) ? null : $field->lbl;
            $field_details[$key]['type'] =  $field_type;
            $field_details[$key]['key'] =  $key;
            if (isset($field->mul)) {
                $field_details[$key]['mul'] =  $field->mul;
            }
            if ($field_type === 'file-up' && isset($field->exts)) {
                $field_details[$key]['valid']['type'] = $field->exts;
            }
            if (isset($field->valid) && !is_null($field->valid)) {
                if (isset($field->valid->req)) {
                    $field_details[$key]['valid']['req'] = $field->valid->req;
                }
                if (isset($field->valid->reqMsg)) {
                    $field_details[$key]['valid']['reqMsg'] = $field->valid->reqMsg;
                }
                if (isset($field->valid->typMsg)) {
                    $field_details[$key]['valid']['typMsg'] = $field->valid->typMsg;
                }
            }
        }
        if ($this->isGCLIDEnabled()) {
            $field_details['GCLID']['name'] = 'GCLID';
            $field_details['GCLID']['adminLbl'] = 'GCLID';
            $field_details['GCLID']['key'] = 'GCLID';
            $field_details['GCLID']['type'] = 'hidden';
        }
        $this->_fields = $field_details;
        return $field_details;
    }
    public function getFieldsKey()
    {
        $form_content = \json_decode(static::$form[0]->form_content);
        $fields = $form_content->fields;
        $field_details = array();
        foreach ($fields as $key => $field) {
            if ($field->typ === 'recaptcha') {
                continue;
            }
            // $field_name = empty($field->lbl) ? null : \preg_replace('/[\`\~\!\@\#\$\'\.\s\?\+\-\*\&\|\/\\\!]/', '_', $field->lbl);
            $field_details[$key] =  $key;
        }
        if ($this->isGCLIDEnabled()) {
            $field_details['GCLID'] = 'GCLID';
        }
        return $field_details;
    }

    public function getFieldLabel()
    {
        if (!is_null($this->_field_label)) {
            return $this->_field_label;
        }
        $form_content = \json_decode(static::$form[0]->form_content);
        $layout = $form_content->layout;
        $fields = $form_content->fields;
        $field_details = array();
        $fieldCounter = 0;
        foreach ($fields as $key => $field) {
            if ($field->typ === 'recaptcha' || $field->typ === 'html' || $field->typ === 'button') {
                continue;
            }
            // $field_name =  empty($field->lbl) ? null : preg_replace('/[\`\~\!\@\#\$\'\.\s\?\+\-\*\&\|\/\\\!]/', '_', $field->lbl);
            $field_details[$fieldCounter]['name'] =  empty($field->lbl) ? null : $field->lbl;
            $field_details[$fieldCounter]['adminLbl'] =  empty($field->adminLbl) ? $field_details[$fieldCounter]['name'] : $field->adminLbl;
            $field_details[$fieldCounter]['key'] =  $key;
            $field_details[$fieldCounter]['type'] =  $field->typ;
            $fieldCounter += 1;
        }
        if ($this->isGCLIDEnabled()) {
            $field_details[$fieldCounter]['name'] = 'GCLID';
            $field_details[$fieldCounter]['adminLbl'] = 'GCLID';
            $field_details[$fieldCounter]['key'] = 'GCLID';
            $field_details[$fieldCounter]['type'] = 'hidden';
        }
        $this->_field_label = $field_details;
        return $field_details;
    }

    public function getUploadFields()
    {
        if (!is_null($this->_has_upload)) {
            return $this->_has_upload;
        }
        $upload_fields = array();
        $form_field_details = $this->getFields();
        foreach ($form_field_details as $field_name => $__field_detail) {
            if (isset($__field_detail['type']) && $__field_detail['type'] === 'file-up') {
                $upload_fields[] = $field_name;
            }
        }
        $this->_has_upload = $upload_fields;
        return $upload_fields;
    }

    public function saveFormEntry($submitted_data)
    {
        unset($submitted_data[$this->getFormIdentifier()]);
        $formEntryModel = new FormEntryModel();
        $formEntryLogModel = new FormEntryLogModel();
        $key = null;
        $ipTool = new IpTool();
        $user_details = $ipTool->getUserDetail();
        global $wpdb;
        $wpdb->query("START TRANSACTION");
        $entry_id = $formEntryModel->insert(
            array(
                'form_id' => $this->form_id,
                'user_id' => $user_details['id'],
                'user_ip' => $user_details['ip'],
                'user_device' => $user_details['device'],
                'referer' => $user_details['page'],
                'status' => 0,
                'created_at' => $user_details['time']
            )
        );
        $log_id = null;
        if (is_wp_error($entry_id)) {
            return new WP_Error('insert_error', __('Sorry, Error occured in saving form entry', 'bitform'));
        }
        if ($entry_id) {
            $log_id = $formEntryLogModel->form_log_insert(
                array(
                    "user_id" => $user_details['id'],
                    "action_type" => "create",
                    "log_type" => "entry",
                    "ip" => $user_details['ip'],
                    "form_entry_id" => $entry_id,
                    "content" => $key,
                    "form_id" => $this->form_id,
                    "created_at" => $user_details['time'],
                )
            );

            if (is_wp_error($log_id)) {
                $wpdb->query("ROLLBACK");
                return new WP_Error('error_entry_log', __('Sorry, error occured in logging form entry', 'bitform'));
            }
        }
        if ($entry_id) {
            $entryMeta = new FormEntryMetaModel();
            $submitted_fields = $this->getFormContentWithValue($submitted_data)->fields;
            $workFlowRunHelper = new WorkFlowRunHelper($this->form_id);
            $workFlowreturnedOnSubmit = $workFlowRunHelper->executeOnSubmit(
                'create',
                $submitted_fields,
                $submitted_data,
                $entry_id,
                $log_id
            );
            if (!empty($workFlowreturnedOnSubmit['fields'])) {
                $submitted_data = $workFlowreturnedOnSubmit['fields'];
            }
            $errorInEntryMetaInsert = false;
            $file_fields = $this->getUploadFields();
            $fileHandler = new FileHandler;
            foreach ($_FILES as $file_name => $file_details) {
                if ($file_fields && in_array($file_name, $file_fields)) {
                    $filePath = $fileHandler->moveUploadedFiles($file_details, $this->form_id, $entry_id);
                    if (!empty($filePath)) {
                        $submitted_data[$file_name] = $filePath;
                    }
                }
            }
            foreach ($submitted_data as $key => $value) {
                $status = $entryMeta->insert(
                    array(
                        'bitforms_form_entry_id' => $entry_id,
                        'meta_key' => $key,
                        'meta_value' => is_string($submitted_data[$key]) ?
                        wp_unslash($submitted_data[$key]) :
                            wp_json_encode($submitted_data[$key])
                    )
                );
                if (is_wp_error($status)) {
                    $errorInEntryMetaInsert = true;
                    break;
                }
            }

            if ($errorInEntryMetaInsert) {
                $wpdb->query("ROLLBACK");
                return new WP_Error('insert_error', __('Sorry, Error occured in saving form entry data', 'bitform'));
            }
            $wpdb->query("COMMIT");
            $workFlowreturnedOnSubmit['fields'] = $submitted_data;
            return $workFlowreturnedOnSubmit;
        }
    }

    public function updateFormEntry($updatedValue, $formID, $entryID)
    {
        // var_dump($updatedValue);
        $formEntryModel = new FormEntryModel();
        $formEntryLogModel = new FormEntryLogModel();
        $formOldData = $formEntryLogModel->get_form_value($entryID);
        $key = null;
        $entryMeta = new FormEntryMetaModel();
        $ipTool = new IpTool();
        $user_details = $ipTool->getUserDetail();
        $form_fields = $this->getFields();
        $field_map = [];
        foreach ($formOldData as $index => $data) {
            foreach ($form_fields as $field_key => $field) {
                if ($data->meta_key == $field['key']) {
                    $field_map[$field_key] = $field['key'];
                }
            }
        }
        $formFieldValidator = new FormFieldValidator($form_fields, $updatedValue, $_FILES);
        $validateField = $formFieldValidator->validate('edit', $formID);
        if (!$validateField) {
            $errorMessage = count($formFieldValidator->getMessage()) > 0 ?
                $formFieldValidator->getMessage() : __("Internal error occured!!!", 'bitform');
            return new WP_Error('validation_error', $errorMessage);
        }
        $formEntry = $formEntryModel->update(
            array(
                "user_id" => $user_details['id'],
                "user_ip" => $user_details['ip'],
                "user_device" => $user_details['device'],
                "status" => 0,
                "updated_at" => $user_details['time']
            ),
            array(
                'form_id' => $formID,
                'id' => $entryID
            )
        );
        $log_id = null;
        if ($formEntry) {
            $log_id = $formEntryLogModel->form_log_insert(
                array(
                    "user_id" => $user_details['id'],
                    "action_type" => "update",
                    "log_type" => "entry",
                    "ip" => $user_details['ip'],
                    "form_entry_id" => $entryID,
                    "form_id" => $formID,
                    "created_at" => $user_details['time'],
                )
            );
        }

        if (is_wp_error($formEntry) || !$formEntry) {
            return new WP_Error('empty_form', __('provided form entries does not exists', 'bitform'));
        }

        $file_fields = $this->getUploadFields();
        if (count($file_fields) > 0) {
            $fileHandler = new FileHandler();
            foreach ($file_fields as $file_name) {
                if (isset($updatedValue[$file_name . '_old'])) {
                    $file_exists = $entryMeta->get(
                        'meta_value',
                        array(
                            'bitforms_form_entry_id' => $entryID,
                            'meta_key' =>  $file_name
                        )
                    );
                    if (!is_wp_error($file_exists) && count($file_exists) > 0) {
                        $files_in_db = json_decode($file_exists[0]->meta_value);
                        $files_old = empty($updatedValue[$file_name . '_old']) ? [] : explode(',', $updatedValue[$file_name . '_old']);
                        $deleted_file = array_diff($files_in_db, $files_old);
                        if (count($deleted_file) > 0) {
                            $fileHandler->deleteFiles($formID, $entryID, $deleted_file);
                        }
                        $updatedValue[$file_name] = wp_json_encode($files_old);
                    }
                }
                if (!empty($_FILES[$file_name]['name'])) {
                    $meta_value = $fileHandler->moveUploadedFiles($_FILES[$file_name], $formID, $entryID);
                    if (!empty($meta_value)) {
                        if (isset($updatedValue[$file_name . '_old']) && !is_wp_error($file_exists) && count($file_exists) > 0) {
                            $meta_value = empty($files_old) ? $meta_value : array_merge($meta_value, $files_old);
                            $updatedValue[$file_name] = wp_json_encode($meta_value);
                        } else {
                            $data =  array(
                                'bitforms_form_entry_id' => $entryID,
                                'meta_key' => $file_name,
                                'meta_value' => wp_json_encode($meta_value)
                            );
                            $newFileInsertStatus = $entryMeta->insert(
                                $data
                            );
                            $updatedValue[$file_name] = wp_json_encode($meta_value);
                        }
                    }
                }
            }
        }



        unset($updatedValue['_ajax_nonce']);
        unset($_REQUEST['g-recaptcha-response']);

        $workFlowRunHelper = new WorkFlowRunHelper($formID);
        $workFlowreturnedOnSubmit = $workFlowRunHelper->executeOnSubmit(
            'edit',
            $this->getFormContentWithValue($updatedValue)->fields,
            $updatedValue,
            $entryID,
            $log_id
        );
        if (!empty($workFlowreturnedOnSubmit['fields'])) {
            $updatedValue = $workFlowreturnedOnSubmit['fields'];
        }

        $toUpdateValues = [];
        foreach ($form_fields as $field) {
            if (isset($updatedValue[$field['key']])) {
                $toUpdateValues[$field['key']] = $updatedValue[$field['key']];
            }
        }

        $formEntryMetaUpdateStatus = $entryMeta->update(
            $toUpdateValues,
            array(
                'bitforms_form_entry_id' => $entryID
            )
        );
        if (is_wp_error($formEntryMetaUpdateStatus) || isset($newFileInsertStatus) && is_wp_error($newFileInsertStatus)) {
            return $formEntryMetaUpdateStatus;
        }
        $toUpdateValues = array_merge($formEntryMetaUpdateStatus, array('entry_id' => $entryID));
        if (empty($workFlowreturnedOnSubmit['message'])) {
            $workFlowreturnedOnSubmit['message'] = __('Entry Updated Successfully', 'bitform');
        }
        $workFlowreturnedOnSubmit['updatedData'] = $toUpdateValues;
        $counter = 0;
        for ($i = 0; $i < count($formOldData); $i++) {
            if (array_key_exists($formOldData[$i]->meta_key . '_old', $toUpdateValues)) {
                unset($toUpdateValues[$formOldData[$i]->meta_key . '_old']);
            }
            if (in_array($formOldData[$i]->meta_key, $file_fields)) {
                if (
                    empty($_FILES[$formOldData[$i]->meta_key]['name'])
                    || (is_array($_FILES[$formOldData[$i]->meta_key]['name'])
                        && count($_FILES[$formOldData[$i]->meta_key]['name']) === 1
                        && empty($_FILES[$formOldData[$i]->meta_key]['name'][0]))
                ) {
                    unset($toUpdateValues[$formOldData[$i]->meta_key]);
                    continue;
                }
                if (is_array($_FILES[$formOldData[$i]->meta_key]['name']) && !in_array($_FILES[$formOldData[$i]->meta_key]['name'], json_decode($formOldData[$i]->meta_value))) {
                    $key[$i] = '${' . $formOldData[$i]->meta_key . '} file was Updated  To ' . json_encode($_FILES[$formOldData[$i]->meta_key]['name']);
                } elseif (!is_array($_FILES[$formOldData[$i]->meta_key]['name']) && !in_array($_FILES[$formOldData[$i]->meta_key]['name'], json_decode($formOldData[$i]->meta_value))) {
                    $key[$i] = '${' . $formOldData[$i]->meta_key . '} file was Updated  To ' . $_FILES[$formOldData[$i]->meta_key]['name'];
                }
                unset($toUpdateValues[$formOldData[$i]->meta_key]);
            } else if (isset($toUpdateValues[$formOldData[$i]->meta_key])) {
                if (is_array($toUpdateValues[$formOldData[$i]->meta_key])) {
                    if (json_decode($formOldData[$i]->meta_value) !== $toUpdateValues[$formOldData[$i]->meta_key]) {
                        $key[$i] = '${' . $formOldData[$i]->meta_key . '} was Updated From ' . implode(',', json_decode($formOldData[$i]->meta_value)) . ' To ' . implode(",", $toUpdateValues[$formOldData[$i]->meta_key]);
                    }
                } elseif (is_string($toUpdateValues[$formOldData[$i]->meta_key]) && !empty($toUpdateValues[$formOldData[$i]->meta_key])) {
                    if ($formOldData[$i]->meta_value !== $toUpdateValues[$formOldData[$i]->meta_key]) {
                        $key[$i] = '${' . $formOldData[$i]->meta_key . '} was Updated' . ($formOldData[$i]->meta_value ? ' From ' . $formOldData[$i]->meta_value : '') . ' To ' . $toUpdateValues[$formOldData[$i]->meta_key];
                    }
                }
            }
            $counter++;
        }

        $newField = array_keys(array_diff_key($formEntryMetaUpdateStatus, $field_map));
        for ($i = 0; $i < count($newField); $i++) {
            if (is_array($toUpdateValues[$newField[$i]])) {
                if (!empty($toUpdateValues[$newField[$i]])) {
                    $key[$counter + $i] =  '${' . $newField[$i] . '} Updated To ' . implode(",", $toUpdateValues[$newField[$i]]);
                }
            } elseif (is_string($newField[$i])) {
                if (!empty($toUpdateValues[$newField[$i]])) {
                    $key[$counter + $i] = '${' . $newField[$i] . '} Updated To ' . $toUpdateValues[$newField[$i]];
                }
            }
        }
        if ($key !== null) {
            $logUpdate = implode("b::f", (array) $key);
            $formEntryLogUpdate = $formEntryLogModel->logUpdate($logUpdate, $log_id);
        }
        return $workFlowreturnedOnSubmit;
    }

    public function setSubmissionCount($countStep = 1)
    {
        $update_status =  $this->formModel->update(
            array(
                'entries' => intval(static::$form[0]->entries) + $countStep
            ),
            array(
                'id' => $this->form_id
            )
        );
    }
    public function resetSubmissionCount($countStep)
    {
        $update_status =  $this->formModel->update(
            array(
                'entries' => intval($countStep)
            ),
            array(
                'id' => $this->form_id
            )
        );
    }

    public function getCaptchaSettings()
    {
        $formContents = $this->getFormContent();
        $fieldStr = wp_json_encode($formContents->fields);
        if (strpos($fieldStr, '"typ":"recaptcha"') !== false) {
            return true;
        }
    }
    public function getCaptchaV3Settings()
    {
        $formContents = $this->getFormContent();
        if (!empty($formContents->additional->enabled) && !empty($formContents->additional->enabled->recaptchav3)) {
            return $formContents->additional->settings->recaptchav3;
        }
        return false;
    }

    public function isGCLIDEnabled()
    {
        $formContents = $this->getFormContent();
        if (isset($formContents->additional->enabled->captureGCLID) && $formContents->additional->enabled->captureGCLID) {
            return true;
        }
        return false;
    }
}
