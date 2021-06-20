<?php
namespace BitCode\BitForm\Core\Util;

final class FieldValueHandler
{
    public static function replaceFieldWithValue($stringToReplaceField, $fieldValues)
    {
        if (empty($stringToReplaceField)) {
            return $stringToReplaceField;
        }
        if (!is_string($stringToReplaceField)) {
            $stringToReplaceField = wp_json_encode($stringToReplaceField);
        }
        $fieldPattern = '/\${\w[^ ${}]*}/';
        preg_match_all($fieldPattern, $stringToReplaceField, $matchedField);
        if (empty($matchedField)) {
            return $stringToReplaceField;
        }
        $uniqueFieldsInStr = array_unique($matchedField[0]);
        foreach ($uniqueFieldsInStr as $key => $value) {
            $fieldName = substr($value, 2, strlen($value)-3);
            if (isset($fieldValues[$fieldName])) {
                $targetFieldValue = isset($fieldValues[$fieldName]['value']) ? $fieldValues[$fieldName]['value'] : $fieldValues[$fieldName];
                if (gettype($targetFieldValue) === 'array' || gettype($targetFieldValue) === 'object') {
                    foreach ((array)$targetFieldValue as $singleTargetVal) {
                        if (isset($fieldValue)) {
                            if (is_numeric($fieldValue) && is_numeric($singleTargetVal)) {
                                $fieldValue = $fieldValue + $singleTargetVal;
                            } else {
                                $fieldValue = "$fieldValue  $singleTargetVal";
                            }

                        } else {
                            $fieldValue = $targetFieldValue;
                        }

                    }
                    // $fieldValue = wp_json_encode($targetFieldValue);
                } else {
                    $fieldValue = strval($targetFieldValue);
                }
                $stringToReplaceField =  str_replace($value, $fieldValue, $stringToReplaceField);
            } elseif (array_search($fieldName, $fieldValues) !== false) {
                $stringToReplaceField =  str_replace($value, '', $stringToReplaceField);
            }
        }
        return $stringToReplaceField;
    }

    public static function validateMailArry($emailAddresses, $fieldValues)
    {
        if (!is_array($emailAddresses)) {
            return [FieldValueHandler::replaceFieldWithValue($emailAddresses, $fieldValues)];
        }
        foreach ($emailAddresses as $key=>$email) {
            if (!is_email($email)) {
                $email = FieldValueHandler::replaceFieldWithValue($email, $fieldValues);
                if (is_email($email)) {
                    $emailAddresses[$key] = $email;
                }
            }
        }
        return $emailAddresses;
    }
}
