<?php
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ********************************************************************************/
require_once 'modules/Reports/Reports.php';
require_once 'include/logging.php';
require_once 'include/database/PearDatabase.php';

global $current_user,$adb;
Vtiger_Request::validateRequest();
if (isset($_REQUEST['idlist']) && $_REQUEST['idlist']!= '') {
	$id_array = array();
	$id_array = explode(':', $_REQUEST['idlist']);

	$userprivs = $current_user->getPrivileges();
	$query = $adb->pquery(
		"select userid
			from vtiger_user2role
			inner join vtiger_role on vtiger_role.roleid=vtiger_user2role.roleid
			where vtiger_role.parentrole like '".$userprivs->getParentRoleSequence()."::%'",
		array()
	);
	$subordinate_users = array();
	for ($i=0; $i<$adb->num_rows($query); $i++) {
		$subordinate_users[] = $adb->query_result($query, $i, 'userid');
	}

	for ($i=0; $i<count($id_array)-1; $i++) {
		$own_query = $adb->pquery('SELECT reportname,owner FROM vtiger_report WHERE reportid=?', array($id_array[$i]));
		$owner = $adb->query_result($own_query, 0, 'owner');
		if (is_admin($current_user) || in_array($owner, $subordinate_users) || $owner==$current_user->id) {
			DeleteReport($id_array[$i]);
		} else {
			$del_failed[]= $adb->query_result($own_query, 0, 'reportname');
		}
	}

	if (!empty($del_failed)) {
		header('Location: index.php?action=ReportsAjax&file=ListView&mode=ajax&module=Reports&del_denied='.urlencode(implode(',', $del_failed)));
	} else {
		header('Location: index.php?action=ReportsAjax&file=ListView&mode=ajax&module=Reports');
	}
} elseif (isset($_REQUEST['record']) && $_REQUEST['record']!= '') {
	$id = vtlib_purify($_REQUEST['record']);
	DeleteReport($id);
	header('Location: index.php?action=ReportsAjax&file=ListView&mode=ajaxdelete&module=Reports');
}

/** To Delete a Report
 * @param integer report id
 * @return void
 */
function DeleteReport($reportid) {
	global $adb;
	$adb->pquery('delete from vtiger_selectquery where queryid=?', array($reportid));

	$adb->pquery('delete from vtiger_report where reportid=?', array($reportid));

	$reportsql = 'DELETE FROM vtiger_scheduled_reports WHERE reportid=?';
	$adb->pquery($reportsql, array($reportid));

	$result =$adb->pquery('SELECT * FROM vtiger_homereportchart WHERE reportid=?', array($reportid));
	$num_rows = $adb->num_rows($result);
	if ($num_rows) {
		$delHomeSql='delete from vtiger_homestuff where stuffid=?';
		for ($i=0; $i<$num_rows; $i++) {
			$stuffid = $adb->query_result($result, $i, 'stuffid');
			$adb->pquery($delHomeSql, array($stuffid));
		}
	}
}
?>
