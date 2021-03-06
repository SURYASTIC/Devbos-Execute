<?php
/*+*******************************************************************************
 *  The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ('License'); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *********************************************************************************/
global $mod_strings, $app_strings, $theme;
$theme_path='themes/'.$theme.'/';
$image_path=$theme_path.'images/';

require_once 'include/home.php';
require_once 'Smarty_setup.php';
require_once 'include/freetag/freetag.class.php';

$homeObj=new Homestuff;

$widgetInfoList = json_decode($_REQUEST['widgetInfoList'], true);
$widgetHTML = array();
$smarty=new vtigerCRM_Smarty;
$smarty->assign('MOD', $mod_strings);
$smarty->assign('APP', $app_strings);
$smarty->assign('THEME', $theme);
$smarty->assign('IMAGE_PATH', $image_path);

foreach ($widgetInfoList as $widgetInfo) {
	$widgetType = $widgetInfo['widgetType'];
	$widgetId = (int)preg_replace('/\D/', '', vtlib_purify($widgetInfo['widgetId'])); // overcomplicated security
	$homestuff_values = '';
	if ($widgetType=='Tag Cloud') {
		$freetag = new freetag();
		$smarty->assign('ALL_TAG', $freetag->get_tag_cloud_html('', $current_user->id));
		$smarty->assign('USER_TAG_SHOWAS', getTagCloudShowAs($current_user->id));
		$html = $smarty->fetch('Home/TagCloud.tpl');
	} elseif ($widgetType == 'Notebook') {
		$contents = $homeObj->getNoteBookContents($widgetId);
		$smarty->assign('NOTEBOOK_CONTENTS', $contents);
		$smarty->assign('NOTEBOOKID', $widgetId);
		$html = $smarty->fetch('Home/notebook.tpl');
	} elseif ($widgetType == 'URL') {
		$url = $homeObj->getWidgetURL($widgetId);
		if (strpos($url, '://') === false) {
			$url = 'https://'.trim($url);
		}
		$smarty->assign('URL', $url);
		$smarty->assign('WIDGETID', $widgetId);
		$html = $smarty->fetch('Home/HomeWidgetURL.tpl');
	} else {
		$homestuff_values=$homeObj->getHomePageStuff($widgetId, $widgetType);
		$html = '';
		if ($widgetType == 'DashBoard') {
			$homeObj->getDashDetails($widgetId, 'type');
			$dashdet=$homeObj->dashdetails;
			$smarty->assign('DASHDETAILS', $dashdet);
		}
	}
	$smarty->assign('HOME_STUFFTYPE', $widgetType);
	$smarty->assign('HOME_STUFFID', $widgetId);
	$smarty->assign('HOME_STUFF', $homestuff_values);
	$smarty->assign('THEME', $theme);
	$smarty->assign('IMAGE_PATH', $image_path);

	$html .= $smarty->fetch('Home/HomeBlock.tpl');
	$widgetHTML[$widgetId] = $html;
}
echo json_encode($widgetHTML);
?>