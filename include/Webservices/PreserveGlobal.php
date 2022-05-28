<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class VTWS_PreserveGlobal {

	private static $globalData = array();

	public static function preserveGlobal($name, $value) {
		//$name store the name of the global.
		global ${$name};

		if (!empty($$name)) {
			if (!isset(VTWS_PreserveGlobal::$globalData[$name]) || !is_array(VTWS_PreserveGlobal::$globalData[$name])) {
				VTWS_PreserveGlobal::$globalData[$name] = array();
			}
			VTWS_PreserveGlobal::$globalData[$name][] = $$name;
		}
		$$name = $value;
		return $$name;
	}

	public static function restore($name) {
		//$name store the name of the global.
		global ${$name};

		if (isset(VTWS_PreserveGlobal::$globalData[$name]) && is_array(VTWS_PreserveGlobal::$globalData[$name]) && count(VTWS_PreserveGlobal::$globalData[$name]) > 0) {
			$$name = array_pop(VTWS_PreserveGlobal::$globalData[$name]);
			unset(VTWS_PreserveGlobal::$globalData[$name]);
		}
	}

	public static function getGlobal($name) {
		global ${$name};
		return VTWS_PreserveGlobal::preserveGlobal($name, $$name);
	}

	public static function getGlobalData() {
		return VTWS_PreserveGlobal::$globalData;
	}

	public static function flush() {
		foreach (VTWS_PreserveGlobal::$globalData as $name => $detail) {
			//$name store the name of the global.
			global ${$name};
			if (is_array(VTWS_PreserveGlobal::$globalData[$name]) && count(VTWS_PreserveGlobal::$globalData[$name]) > 0) {
				$$name = array_pop(VTWS_PreserveGlobal::$globalData[$name]);
				unset(VTWS_PreserveGlobal::$globalData[$name]);
			}
		}
	}
}
?>