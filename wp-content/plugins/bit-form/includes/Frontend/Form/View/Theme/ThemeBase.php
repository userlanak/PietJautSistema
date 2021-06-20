<?php

namespace BitCode\BitForm\Frontend\Form\View\Theme;

class ThemeBase
{
  public function getField($field, $rowID, $field_name, $error = null, $value = null, $formID = null)
  {
    switch ($field->typ) {
      case 'text':
      case 'number':
      case 'password':
      case 'email':
      case 'url':
      case 'date':
      case 'datetime-local':
      case 'time':
      case 'month':
      case 'week':
      case 'color':
        return $this->textField($field, $rowID, $field_name, $error, $value, $formID);
      case 'textarea':
        return $this->textArea($field, $rowID, $field_name, $error, $value, $formID);
      case 'check':
        return $this->checkBox($field, $rowID, $field_name, $error, $value, $formID);
      case 'radio':
        return $this->radioBox($field, $rowID, $field_name, $error, $value, $formID);
      case 'select':
        return $this->dropDown($field, $rowID, $field_name, $error, $value, $formID);
      case 'file-up':
        return $this->fileUp($field, $rowID, $field_name, $error, $value, $formID);
      case 'recaptcha':
        return $this->recaptcha($field, $rowID, $field_name, $error, $value, $formID);
      case 'decision-box':
        return $this->decisionBox($field, $rowID, $field_name, $error, $value, $formID);
      case 'html':
        return $this->html($field, $rowID, $field_name, $error, $value, $formID);
      case 'paypal':
        return $this->paypal($field, $rowID, $field_name, $error, $value, $formID);
      case 'razorpay':
        return $this->razorPay($field, $rowID, $field_name, $error, $value, $formID);
      case 'submit':
        return $this->submitBtns($field, $rowID, $field_name, $error, $value, $formID);
      case 'button':
        return $this->button($field, $rowID, $field_name, $error, $value, $formID);
      default:
        break;
    }
  }

  protected function setTag($tag, $value, $attr = null)
  {
    echo "<$tag $attr>" . esc_html($value) . "</$tag>";
  }

  protected function setAttribute($attr, $value = null)
  {
    echo " $attr='" . esc_attr($value) . "' ";
  }
  protected function setSingleValuedAttribute($attr)
  {
    echo " $attr ";
  }
}
