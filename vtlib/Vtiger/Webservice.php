<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
include_once 'vtlib/Vtiger/Utils.php';

/**
 * Provides API to register/unregsiter module in Webservice
 * @package vtlib
 */
class Vtiger_Webservice {

	/**
	 * Helper function to log messages
	 * @param string Message to log
	 * @param boolean true appends linebreak, false to avoid it
	 */
	public static function log($message, $delim = true) {
		Vtiger_Utils::Log($message, $delim);
	}

	/**
	 * Initialize webservice for the given module
	 * @param Vtiger_Module Instance of the module.
	 */
	public static function initialize($moduleInstance) {
		if ($moduleInstance->isentitytype && function_exists('vtws_addDefaultModuleTypeEntity')) {
			vtws_addDefaultModuleTypeEntity($moduleInstance->name);
			self::log('Initializing webservices support ...DONE');
		}
	}

	/**
	 * Initialize webservice for the given module
	 * @param Vtiger_Module Instance of the module.
	 */
	public static function uninitialize($moduleInstance) {
		if ($moduleInstance->isentitytype && function_exists('vtws_deleteWebserviceEntity')) {
			vtws_deleteWebserviceEntity($moduleInstance->name);
			self::log('De-Initializing webservices support ...DONE');
		}
	}
}
?>
