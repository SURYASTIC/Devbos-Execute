<?php
/*+*******************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ********************************************************************************/
require_once 'include/utils/UserInfoUtil.php';
require_once 'Smarty_setup.php';
$smarty = new vtigerCRM_Smarty;

global $mod_strings, $app_strings, $adb, $theme, $default_charset;
$theme_path='themes/'.$theme.'/';
$image_path=$theme_path.'images/';

$hrarray = getRoleAndSubordinatesHierarchy();
//Constructing the Roledetails array
$role_det = getAllRoleDetails();
$result = $adb->pquery('select * from vtiger_role', array());
$num_rows=$adb->num_rows($result);
$mask_roleid=array();
$del_roleid = (isset($_REQUEST['maskid']) ? vtlib_purify($_REQUEST['maskid']) : '');
if ($del_roleid != '' && strlen($del_roleid) >0) {
	$mask_roleid = getRoleAndSubordinatesRoleIds($del_roleid);
}
$roleout = '';
$roleout = indent($hrarray, $roleout, $role_det, $mask_roleid);

/** recursive function to construct the role tree ui
  * @param array Hierarchial role tree array with only the roleid
  * @param string html string ouput of the constucted role tree ui
  * @param array Roledetails array got from calling getAllRoleDetails()
  * @param integer role id to be masked from selecting in the tree
  * @return string html string ouput of the constucted role tree ui
 */
function indent($hrarray, $roleout, $role_det, $mask_roleid = '') {
	global $theme, $app_strings, $default_charset;
	foreach ($hrarray as $roleid => $value) {
		$role_det_arr=$role_det[$roleid];
		$roleid_arr=$role_det_arr[2];
		$rolename = htmlentities($role_det_arr[0], ENT_QUOTES, $default_charset);
		$roledepth = $role_det_arr[1];
		$roleout .= '<ul class="uil" id="'.$roleid.'" style="display:block;list-style-type:none;">';
		$roleout .= '<li >';
		if (count($value) >0 && $roledepth != 0) {
			$roleout .= '<img src="' . vtiger_imageurl('minus.gif', $theme) . '" id="img_'.$roleid.'" border="0" alt="'.$app_strings['LBL_EXPAND_COLLAPSE'].'" title="'.
				$app_strings['LBL_EXPAND_COLLAPSE'].'" align="absmiddle" onClick="showhide(\''.$roleid_arr.'\',\'img_'.$roleid.'\')" style="cursor:pointer;">';
		} elseif ($roledepth != 0) {
			$roleout .= '<img src="' . vtiger_imageurl('vtigerDevDocs.gif', $theme) . '" id="img_'.$roleid.'" border="0" alt="'.$app_strings['LBL_EXPAND_COLLAPSE'].
				'" title="'.$app_strings['LBL_EXPAND_COLLAPSE'].'" align="absmiddle">';
		} else {
			$roleout .= '<img src="' . vtiger_imageurl('menu_root.gif', $theme) .'" id="img_'.$roleid.'" border="0" alt="'.$app_strings['LBL_ROOT'].'" title="'.
				$app_strings['LBL_ROOT'].'" align="absmiddle">';
		}
		if ($roledepth == 0 || in_array($roleid, (array)$mask_roleid)) {
			$roleout .= '&nbsp;<b class="genHeaderGray">'.$rolename.'</b>';
		} else {
			if (empty($_REQUEST['type'])) {
				$roleout .= '&nbsp;<a href="javascript:loadValue(\'user_'.$roleid.'\',\''.$roleid.'\');" class="x" id="user_'.$roleid.'">'.$rolename.'</a>';
			} else {
				$picklist_module = vtlib_purify($_REQUEST['picklistmodule']);
				$picklist_fieldname = vtlib_purify($_REQUEST['pick_fieldname']);
				$picklist_uitype = vtlib_purify($_REQUEST['pick_uitype']);
				$roleout .= '&nbsp;<a href="index.php?action=SettingsAjax&module=Settings&mode=edit&file=EditComboField&fld_module='.$picklist_module.'&fieldname='.
					$picklist_fieldname.'&parentroleid='.$roleid.'&uitype='.$picklist_uitype.'" class="x" id="user_'.$roleid.'">'.$rolename.'</a>';
			}
		}
		$roleout .= '</li>';
		if (count($value) > 0) {
			$roleout = indent($value, $roleout, $role_det, $mask_roleid);
		}

		$roleout .= '</ul>';
	}
	return $roleout;
}
$smarty->assign('THEME', $theme_path);
$smarty->assign('THEME', $theme);
$smarty->assign('IMAGE_PATH', $image_path);
$smarty->assign('APP', $app_strings);
$smarty->assign('LBL_CHARSET', $default_charset);
$smarty->assign('CMOD', $mod_strings);
$smarty->assign('coreBOS_uiapp_name', GlobalVariable::getVariable('Application_UI_Name', $coreBOS_app_name));
$smarty->assign('ROLETREE', $roleout);
$smarty->display('RolePopup.tpl');
?>