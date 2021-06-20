<?php

namespace BitCode\BitForm\Frontend\Form\View\Theme;

use BitCode\BitForm\Core\Integration\IntegrationHandler;

final class DefaultTheme extends ThemeBase
{
  protected function fileUp($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $name = esc_attr($field_name);
    $name .= isset($field->mul) ? '[]' : null;
    $isReqSym = empty($field->valid->req) ? null : ' *';
    $isDisabled = empty($field->valid->disabled) ? null : 'disabled';
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;
    $lbl = isset($field->lbl) ? "<label class='fld-lbl fld-lbl-$formID' for='$rowID'>" . esc_html($field->lbl) . $isReqSym . "</label>" : "";
    $upBtnTxt = isset($field->upBtnTxt) ? "<span>" . esc_html($field->upBtnTxt) . "</span>" : "";
    $maxUpload =  isset($field->mxUp) ? "Max " . esc_html($field->mxUp) . " MB" : "";
    $req = isset($field->req) ? "required" : "";
    $mul = isset($field->mul) ? "multiple" : "";
    $extention = isset($field->exts) ? "accept='" . esc_attr($field->exts) . "'" : "";
    $err = isset($error) ? "<span style='color: #d52522'>" . esc_html($error) . "</span>" : "";
    // var_dump(function_exists('fastcgi_finish_request'));
    return <<<FILEUPLOAD
          <div class="btcd-fld-itm $rowID $isHidden">
            <div class="fld-wrp fld-wrp-$formID drag" btcd-fld="textarea">
              $lbl
              <div class="btcd-f-input">
                <div class="btcd-f-wrp">
                  <div class="btn-wrp">
                    <button class="btcd-inpBtn" type="button">
                      <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M13.5 7.5l-5.757 5.757a4.243 4.243 0 01-6-6l5.929-5.929a2.828 2.828 0 014 4l-5.758 5.758a1.414 1.414 0 01-2-2L9.5 3.5" stroke="currentColor" /></svg>
                      $upBtnTxt
                    </button>
                  </div>
                  <span class="btcd-f-title">No File Chosen</span>
                  <small class="f-max">$maxUpload</small>
                  <input id="$rowID" name="$name" $req $mul $extention $isDisabled type="file" />
                </div>
              </div>
              $err
            </div>
          </div>
FILEUPLOAD;
  }

  protected function submitBtns($field, $style, $field_id)
  {
    ob_start(); ?>
    <div class="<?php echo $style; ?>">
      <div>
        <div class="btcd-frm-sub <?php $field->align === 'center' ? $this->setSingleValuedAttribute('j-c-c') : ''; ?><?php $field->align === 'right' ? $this->setSingleValuedAttribute('j-c-e') : ''; ?>">
          <button class="btcd-sub-btn btcd-sub <?php $field->btnSiz === 'md' ? $this->setSingleValuedAttribute('btcd-btn-md') : ''; ?> <?php $field->fulW ? $this->setSingleValuedAttribute('ful-w') : ''; ?>" type="submit" <?php isset($field->name) ? $this->setAttribute('name', $field->name) : '' ?>><?php echo esc_html($field->subBtnTxt) ?></button>
          <?php //{'rstBtnTxt' in attr && <button className={`btcd-sub-btn btcd-rst ${attr.btnSiz === 'md' && 'btcd-btn-md'} ${attr.fulW && 'ful-w'}`} type="button">{attr.rstBtnTxt}</button>}
          ?>
          <?php if (!empty($field->rstBtnTxt)) : ?>
            <button class="btcd-sub-btn btcd-rst <?php $field->btnSiz === 'md' ? $this->setSingleValuedAttribute('btcd-btn-md') : ''; ?> <?php $field->fulW ? $this->setSingleValuedAttribute('ful-w') : ''; ?>" type="reset"><?php echo esc_html($field->rstBtnTxt) ?></button>
          <?php endif ?>
        </div>
      </div>
    </div>
<?php
    return ob_get_clean();
  }


  protected function button($field, $style, $field_name,  $error, $value, $formID)
  {

    $align = $field->align === 'center' ? 'j-c-c' : ($field->align === 'right' ? 'j-c-e' : '');
    if ($field->btnTyp === 'reset') {
      $btnCls = 'btcd-rst';
      $name = '';
    } else {
      $btnCls = 'btcd-sub';
      $name = " name='$field_name'";
    }
    $btnSizCls = $field->btnSiz === 'md' ? 'btcd-btn-md' : '';
    $btnfulW = !empty($field->fulW) ? 'ful-w' : '';
    $btnTyp = !empty($field->btnTyp) ? "type='$field->btnTyp'" : '';
    return <<<BUTTON
    <div class="btcd-fld-itm $style">
      <div class='fld-wrp fld-wrp-${formID}'>
        <div class='btcd-frm-sub $align'>
          <button
            class='btcd-sub-btn $btnCls $btnSizCls $btnfulW'
            $btnTyp
            $name
          >
            $field->txt
          </button>
        </div>
      </div>
    </div>
BUTTON;
  }

  protected function textField($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $isReqSym = empty($field->valid->req) ? null : ' *';
    $isDisabled = empty($field->valid->disabled) ? null : 'disabled';
    $readonly = empty($field->valid->readonly) ? null : 'readonly';
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;
    $lbl = isset($field->lbl) ? "<label class='fld-lbl fld-lbl-$formID' for='$rowID'>" . esc_html($field->lbl) . $isReqSym . "</label>" : "";
    $name = isset($field_name) ? "name='" . esc_attr($field_name) . "'" : "";
    $ph = isset($field->ph) ? "placeholder='" .  esc_attr($field->ph) . "'" : "";
    $mx = isset($field->mx) ? "max='" .  esc_attr($field->mx) . "'" : "";
    $mn = isset($field->mn) ? "min='" .  esc_attr($field->mn) . "'" : "";
    $val = isset($value) ? "value='" .  esc_attr($value) . "'" : "";
    $required = isset($field->valid->req) ? "required" : "";
    $err = isset($error) ? "<span style='color: #d52522;'>" . $error . "</span>" : "";

    return <<<TEXTFIELD
      <div class="btcd-fld-itm $rowID $isHidden">
        <div class="fld-wrp fld-wrp-$formID drag" btcd-fld="text-fld">
          $lbl
          <input id="$rowID" class="fld fld-$formID no-drg" type="$field->typ" $name $ph $mx $mn $val $required $isDisabled $readonly/>
          $err
        </div>
      </div>
TEXTFIELD;
  }

  protected function textArea($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $isReqSym = empty($field->valid->req) ? null : ' *';
    $isDisabled = empty($field->valid->disabled) ? null : 'disabled';
    $readonly = empty($field->valid->readonly) ? null : 'readonly';
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;
    $lbl = isset($field->lbl) ? "<label class='fld-lbl fld-lbl-$formID' for='$rowID'>" . esc_html($field->lbl) . $isReqSym . "</label>" : "";
    $name = isset($field_name) ? "name='" . esc_attr($field_name) . "'" : "";
    $ph = isset($field->ph) ? "placeholder='$field->ph'" : "";
    $val = isset($value) ? $value : "";
    $required = isset($field->valid->req) ? "required" : "";
    $err = isset($error) ? "<span style='color: #d52522;'>" . esc_html($error) . "</span>" : "";

    return <<<TEXTAREA
      <div class="btcd-fld-itm $rowID $isHidden">
        <div class="fld-wrp fld-wrp-$formID drag" btcd-fld="textarea">
          $lbl
          <textarea id="$rowID" class="fld fld-$formID no-drg" type="$field->typ" $name $ph $required $isDisabled $readonly>$val</textArea>
          $err
        </div>
      </div>
TEXTAREA;
  }

  protected function dropDown($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $defaultValue = $value == null ? [] : array_map('esc_html', $value);
    $isDisabled = empty($field->valid->disabled) ? (empty($field->valid->readonly) ? null : 'msl-disabled') : 'msl-disabled';
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;
    $mul = isset($field->mul);
    $isReqSym = empty($field->valid->req) ? null : ' *';
    $lbl = isset($field->lbl) ? "<label class='fld-lbl fld-lbl-$formID' for='$rowID'>" . esc_html($field->lbl) . $isReqSym . "</label>" : "";
    $ph = isset($field->ph) ? "data-placeholder='$field->ph'" : "data-placeholder='Select...'";
    $val = "";
    $err = isset($error) ? "<span style='color: #d52522;'>" . esc_html($error) . "</span>" : "";
    if (isset($field->val)) {
      $dval = is_string($field->val) ? $field->val : implode(",", $field->val);
      $val = "value='$dval'";
    }
    $options = "";
    foreach ($field->opt as $selectOption) {
      $label = esc_html($selectOption->label);
      $value = esc_html($selectOption->value);
      //  preg_match('/asd 1/', $input_line, $output_array);
      $selected = in_array($value, $defaultValue) ? "msl-option-selected" : "";
      $options .= "<option title='$label' class='msl-option btcd-hidden  $selected' value='$value'>$label</option>";
    }

    $defaultValuePlacehold = "<div data-msl='true' $ph class='msl-input' contenteditable='true'></div>";
    if ($defaultValue !== null && sizeof($defaultValue) === 1 && !$mul) {
      $defaultValuePlacehold  = "<span class='msl-single-value' data-msl='true'>$defaultValue[0]</span>";
    }
    return <<<DROPDOWN
    <div class="btcd-fld-itm $rowID $isHidden">
      <div class="fld-wrp fld-wrp-$formID drag" btcd-fld="select">
        $lbl
        <div class="msl-wrp msl-vars no-drg $isDisabled fld fld-$formID dpd" style="width: 100%;">
          <input name="$field_name" type="hidden" value="$val">
            <div data-msl="true" class="msl">
              <div data-msl="true" class="msl-input-wrp" tabindex="0">
                $defaultValuePlacehold
              </div>
              <div class="msl-actions msl-flx"><div role="button" aria-label="toggle-menu" class="msl-btn msl-arrow-btn msl-flx"></div></div></div>
              <div class="msl-options">
                $options
              </div>
            </div>
            $err
      </div>
    </div>
DROPDOWN;
  }

  protected function recaptcha($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;

    return <<<RECAPTCHA
      <div class="btcd-fld-itm $rowID $isHidden">
        <div class="btcd-flx j-c-c" style="min-height='inherit'">
        </div>
      </div>
RECAPTCHA;
  }

  protected function paypal($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $client = '';
    if (isset($field->payIntegID)) {
      $client = $this->getClientKey($field->payIntegID, 'clientID');
    }
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;

    return <<<PAYPAL
    <div class="btcd-fld-itm $rowID $isHidden">
      <div class="fld-wrp fld-wrp-${formID}">
        <div style="width: auto; min-width: 150px; max-width: 750px; margin-left: auto; margin-right: auto;" id="paypal-client-$rowID" paypal-client-key="$client">
        </div>
      </div>
    </div>
PAYPAL;
  }

  protected function razorPay($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $client = '';
    if (isset($field->options->payIntegID)) {
      $client = $this->getClientKey($field->options->payIntegID, 'apiKey');
    }
    $isHidden = (!empty($field->valid->hide) && $field->valid->hide) ? 'btcd-hidden' : null;
    $center = $field->align === 'center' ? 'j-c-c' : '';
    $right = $field->align === 'right' ? 'j-c-e' : '';
    $btnSiz = $field->btnSiz === 'md' ? 'btcd-btn-md' : '';
    $fulW =  $field->fulW ? 'ful-w' : '';

    return <<<RAZORPAY
    <div class="btcd-fld-itm $rowID $isHidden">
      <div class="fld-wrp fld-wrp-${formID}">
        <div class="btcd-frm-sub $center $right">
          <button class="btcd-sub-btn btcd-sub $btnSiz $fulW" type="button" name="$field_name" id="razorpay-client-$rowID" razorpay-client-key="$client">
            <?php echo esc_html($field->btnTxt) ?>
          </button>
        </div>
      </div>
    </div>
RAZORPAY;
  }

  protected function checkBox($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $isReqSym = empty($field->valid->req) ? null : ' *';
    $isDisabled = empty($field->valid->disabled) ? null : 'disabled';
    $readonly = empty($field->valid->readonly) ? null : 'readonly';
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;

    $lbl = isset($field->lbl) ? "<label class='fld-lbl fld-lbl-$formID' for='$rowID'>" . esc_html($field->lbl) . $isReqSym . "</label>" : "";
    $round  = isset($field->round) ? "btcd-round" : "";
    $err = isset($error) ? "<span style='color: #d52522;'>" . esc_html($error) . "</span>" : "";

    $options = "";

    foreach ($field->opt as $checkBoxOption) {
      $name = isset($field_name) ? "name='" . esc_attr($field_name) . "[]" . "'" : "";
      $required = isset($checkBoxOption->req) ? "required" : "";
      $checked = isset($checkBoxOption->check) ? "checked" : "";
      $checkBoxOptionValue = isset($checkBoxOption->val) ? esc_html($checkBoxOption->val) : esc_html($checkBoxOption->lbl);
      if ((!is_array($value) && strpos($value, $checkBoxOptionValue) !== false) || (isset($value) && \is_array($value) && $checkBoxOptionValue === $value[array_search($checkBoxOptionValue, $value)])) {
        $checked = "checked";
      }
      $options .= <<<OPTION
        <label class="btcd-ck-wrp btcd-ck-wrp-$formID">
        <span>$checkBoxOption->lbl</span>
        <input type="checkbox" $checked $required $name value="$checkBoxOptionValue" $isDisabled $readonly/>
        <span class="btcd-mrk ck"></span>
        </label>
OPTION;
    }

    return <<<CHECKBOX
    <div class="btcd-fld-itm $rowID $isHidden">
      <div class="fld-wrp fld-wrp-$formID drag" btcd-fld="textarea">
        $lbl
        <div class="no-drg fld btcd-ck-con $round">
        $options
        </div>
        $err
      </div>
    </div>
CHECKBOX;
  }

  protected function radioBox($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $isReqSym = empty($field->valid->req) ? null : ' *';
    $isDisabled = empty($field->valid->disabled) ? null : 'disabled';
    $readonly = empty($field->valid->readonly) ? null : 'readonly';
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;
    $lbl = isset($field->lbl) ? "<label class='fld-lbl fld-lbl-$formID' for='$rowID'>" . esc_html($field->lbl) . $isReqSym . "</label>" : "";
    $round  = isset($field->round) ? "btcd-round" : "";
    $err = isset($error) ? "<span style='color: #d52522;'>" . esc_html($error) . "</span>" : "";

    $options = "";

    foreach ($field->opt as $checkBoxOption) {
      $name = isset($field_name) ? "name='" . esc_attr($field_name) . "'" : "";
      $required = isset($checkBoxOption->req) ? "required" : "";
      $optionValue = esc_html($checkBoxOption->lbl);
      $checked = "";
      if (isset($checkBoxOption->check)  || $checkBoxOption->lbl === $value) {
        $checked = "checked";
      }
      $options .= <<<OPTION
        <label class="btcd-ck-wrp btcd-ck-wrp-$formID">
          <span>$checkBoxOption->lbl</span>
          <input type="radio" $checked $required $name value="$optionValue" $isDisabled $readonly/>
          <span class="btcd-mrk rdo"></span>
        </label>
OPTION;
    }

    return <<<RADIOBOX
    <div class="btcd-fld-itm $rowID $isHidden">
      <div class="fld-wrp fld-wrp-$formID drag" btcd-fld="textarea">
        $lbl
        <div class="no-drg fld btcd-ck-con $round">
        $options
        </div>
        $err
      </div>
    </div>
RADIOBOX;
  }

  protected function decisionBox($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $isRequired = !empty($field->valid->req) ? 'required' : '';
    $isReqSym = $isRequired ? null : ' *';
    $isChecked = !empty($field->valid->checked) ? 'checked' : '';
    $isDisabled = empty($field->valid->disabled) ? null : 'disabled';
    $readonly = empty($field->valid->readonly) ? null : 'readonly';
    $value = $isChecked ? $field->msg->checked : $field->msg->unchecked;
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;
    $round  = isset($field->round) ? "btcd-round" : "";
    $err = isset($error) ? "<span style='color: #d52522;'>" . esc_html($error) . "</span>" : "";
    $size = $isRequired ? '1px' : '';

    $lbl = !empty($field->lbl) ? wp_kses_post($field->lbl) : (isset($field->info) ? wp_kses_post($field->info->lbl) : '');

    return <<<DECISIONBOX
    <div class="btcd-fld-itm $rowID $isHidden">
      <div class="fld-wrp fld-wrp-$formID drag" btcd-fld="decision-box">
        <div class="no-drg fld fld-{$formID} btcd-ck-con $round">
        <input
            size="height: {$size}, width: {$size}"
            type="checkbox"
            $isDisabled
            $readonly
            $isRequired
            $isChecked
            value="{$value}"
          />
        <label class="btcd-ck-wrp btcd-ck-wrp-{$formID}">
          <span class="decision-content">
            {$lbl}
          </span>
          <input type="hidden" value="{$value}" name="{$field_name}" />
        </label>
        <span class="btcd-mrk ck"></span>
        </div>
        $err
      </div>
    </div>
DECISIONBOX;
  }

  protected function html($field, $rowID, $field_name, $error = null, $value = null, $formID)
  {
    $isHidden = !empty($field->valid->hide) && $field->valid->hide ? 'btcd-hidden' : null;

    $content = !empty($field->content) ? wp_kses_post($field->content) :  '';

    return <<<HTML
    <div class="btcd-fld-itm $rowID $isHidden">
      <div class="fld-wrp fld-wrp-$formID drag" btcd-fld="decision-box">
        $content
      </div>
    </div>
HTML;
  }

  private function getClientKey($integID, $keyName)
  {
    $client = '';
    if (!empty($integID)) {
      $integrationHandler = new IntegrationHandler(0);
      $integration = $integrationHandler->getAIntegration($integID, 'app', 'payments');
      $integration_details = json_decode($integration[0]->integration_details);
      $client = base64_encode($integration_details->{$keyName});
    }
    return $client;
  }
}
