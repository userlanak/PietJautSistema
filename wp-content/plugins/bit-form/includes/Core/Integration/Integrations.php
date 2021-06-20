<?php

/**
 *
 * @package BitForms
 */

namespace BitCode\BitForm\Core\Integration;

/**
 * Provides details of available integration and helps to
 * execute available integrations
 */

use WP_Error;
use FilesystemIterator;

final class Integrations
{
    public $integrations = array();

    /**
     * Undocumented function
     *
     * @return all
     */
    public function getAllIntegrations()
    {
        return $this->allIntegrations();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    protected function allIntegrations()
    {
        $dirs = new FilesystemIterator(__DIR__);
        foreach ($dirs as $dirInfo) {
            if ($dirInfo->isDir()) {
                $integartionBaseName = basename($dirInfo);
                if (
                    file_exists(__DIR__ . '/' . $integartionBaseName)
                    && file_exists(__DIR__ . '/' . $integartionBaseName . '/' . $integartionBaseName . 'Handler.php')
                ) {
                    $integrations[] = $integartionBaseName;
                }
            }
        }
        return $integrations;
    }
    /**
     * Checks a Integration Exists or not
     *
     * @param  String $name Name of Integration
     * @return boolean
     */
    protected static function isExists($name)
    {
        if (file_exists(__DIR__ . '/' . $name) && file_exists(__DIR__ . '/' . $name . '/' . $name . 'Handler.php')) {
            return __NAMESPACE__ . "\\{$name}\\{$name}Handler";
        } else if (class_exists("BitCode\\BitFormPro\\Integration\\{$name}\\{$name}Handler")) {
            return "BitCode\\BitFormPro\\Integration\\{$name}\\{$name}Handler";
        } else {
            return false;
        }
    }
    /**
     * This function helps to get single intgration information
     *
     * @return bool setIntegration()
     */
    public function getIntegration($integartionBaseName)
    {
        return $this->setIntegration($integartionBaseName);
    }

    public function registerAjax()
    {
        $dirs = new FilesystemIterator(__DIR__);
        foreach ($dirs as $dirInfo) {
            if ($dirInfo->isDir()) {
                $integartionBaseName = basename($dirInfo);
                if (
                    file_exists(__DIR__ . '/' . $integartionBaseName)
                    && file_exists(__DIR__ . '/' . $integartionBaseName . '/' . $integartionBaseName . 'Handler.php')
                ) {
                    $integration = __NAMESPACE__ . "\\{$integartionBaseName}\\{$integartionBaseName}Handler";
                    if (method_exists($integration, 'registerAjax')) {
                        $integration::registerAjax();
                        // (new $integration(0, 0))->registerAjax();
                    }
                    /* $handler = new $integration($integrationID, $formID);
                    $handler->execute($integrationHandler, $integrationDetails, $fieldValues); */
                }
            }
        }
    }

    /**
     * This function helps to execute Integration
     *
     * @param Array   $integrations List  of integrstion to execute.
     *                              Element   will be json string like {"id":1}
     * @param Array   $fieldValues  Values of submitted fields
     * @param Integer $formID       ID of current form
     *
     * @return void                  Nothing to return
     */
    public static function executeIntegrations($integrations, $fieldValues, $formID, $entryID = 0, $logID)
    {
        $integrationHandler = new IntegrationHandler($formID);
        if (is_array($integrations)) {
            foreach ($integrations as $integrationIDStr) {
                $integrationID = intval(json_decode($integrationIDStr)->id, 10);
                if (!empty($integrationID) && is_int($integrationID)) {
                    $integrationResult
                        = $integrationHandler->getAIntegration($integrationID);
                    $integrationDetails = is_wp_error($integrationResult) ? null : $integrationResult[0];
                    $integrationName = is_null($integrationDetails) ? null : ucfirst(str_replace(' ', null, $integrationDetails->integration_type));
                    if (!is_null($integrationName) && static::isExists($integrationName)) {
                        $integration = static::isExists($integrationName);
                        $handler = new $integration($integrationID, $formID);
                        $handler->execute($integrationHandler, $integrationDetails, $fieldValues, $entryID, $logID);
                    }
                }
            }
        }
    }

    public static function integrationExecutionHelper($integrations, $fieldValue, $formID, $entryID, $logID)
    {
        if (empty($integrations) || empty($formID)) {
            return;
        }
        foreach ($integrations as $key => $value) {
            self::executeIntegrations($value, $fieldValue, $formID, $entryID, $logID);
        }
    }
}
