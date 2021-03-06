<?php
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ********************************************************************************/
require_once 'include/logging.php';
require_once 'include/database/PearDatabase.php';
$folderid = vtlib_purify($_REQUEST['folderid']);
Vtiger_Request::validateRequest();
if (isset($_REQUEST['idlist']) && $_REQUEST['idlist']!= '') {
	$id_array = array();
	$id_array = explode(':', $_REQUEST['idlist']);
	for ($i = 0; $i < count($id_array)-1; $i++) {
		ChangeFolder($id_array[$i], $folderid);
	}
	header('Location: index.php?action=ReportsAjax&file=ListView&mode=ajaxdelete&module=Reports');
} elseif (isset($_REQUEST['record']) && $_REQUEST['record']!= '') {
	$id = vtlib_purify($_REQUEST['record']);
	ChangeFolder($id, $folderid);
	header('Location: index.php?action=ReportsAjax&file=ListView&mode=ajaxdelete&module=Reports');
}

/** To Change the Report to another folder
  * @param integer report id
  * @param integer folder id to which the report will be moved
  * @return void
 */
function ChangeFolder($reportid, $folderid) {
	global $adb;
	$adb->pquery('update vtiger_report set folderid=? where reportid=?', array($folderid, $reportid));
}
?>
