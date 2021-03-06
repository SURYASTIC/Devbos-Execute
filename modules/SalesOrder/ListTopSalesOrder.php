<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

/**	function used to get the top 5 sales orders from Listview query
 *	@return array $values - array with the title, header and entries like  Array('Title'=>$title,'Header'=>$listview_header,'Entries'=>$listview_entries)
 *	 where as listview_header and listview_entries are arrays of header and entity values which are returned from function getListViewHeader and getListViewEntries
 */
function getTopSalesOrder($maxval, $calCnt) {
	require_once 'data/Tracker.php';
	require_once 'modules/SalesOrder/SalesOrder.php';
	require_once 'include/logging.php';
	require_once 'include/ListView/ListView.php';
	require_once 'include/utils/utils.php';
	require_once 'modules/CustomView/CustomView.php';

	global $current_language, $current_user, $adb;
	$list_max_entries_per_page = GlobalVariable::getVariable('Application_ListView_PageSize', 20, 'SalesOrder');
	$current_module_strings = return_module_language($current_language, 'SalesOrder');

	$url_string = '';
	$sorder = '';
	$order_by = '';
	$oCustomView = new CustomView("SalesOrder");
	$oCustomView->getCustomViewCombo();
	if (!isset($_REQUEST['viewname']) || $_REQUEST['viewname']=='') {
		if ($oCustomView->setdefaultviewid != "") {
			$viewid = $oCustomView->setdefaultviewid;
		} else {
			$viewid = '0';
		}
	}

	//<<<<<<<<<customview>>>>>>>>>
	$currentModule = 'SalesOrder';
	$viewId = getCvIdOfAll($currentModule);
	$queryGenerator = new QueryGenerator($currentModule, $current_user);
	$queryGenerator->initForCustomViewById($viewId);
	$meta = $queryGenerator->getMeta($currentModule);
	$accessibleFieldNameList = array_keys($meta->getModuleFields());
	$customViewFields = $queryGenerator->getCustomViewFields();
	$fields = $queryGenerator->getFields();
	$newFields = array_diff($fields, $customViewFields);
	$widgetFieldsList = array('subject','account_id','quote_id','contact_id','total');
	$widgetFieldsList = array_intersect($accessibleFieldNameList, $widgetFieldsList);
	$widgetSelectedFields = array_chunk(array_intersect($customViewFields, $widgetFieldsList), 2);
	//select the first chunk of two fields
	$widgetSelectedFields = $widgetSelectedFields[0];
	if (count($widgetSelectedFields) < 2) {
		$widgetSelectedFields = array_chunk(array_merge($widgetSelectedFields, $accessibleFieldNameList), 2);
		//select the first chunk of two fields
		$widgetSelectedFields = $widgetSelectedFields[0];
	}
	$newFields = array_merge($newFields, $widgetSelectedFields);
	$queryGenerator->setFields($newFields);
	$_REQUEST = getTopSalesOrderSearch($_REQUEST);
	$queryGenerator->addUserSearchConditions($_REQUEST);
	$search_qry = '&query=true'.getSearchURL($_REQUEST);
	$query = $queryGenerator->getQuery();

	//<<<<<<<<customview>>>>>>>>>

	$query .= " LIMIT " . $adb->sql_escape_string($maxval);

	if ($calCnt == 'calculateCnt') {
		$list_result_rows = $adb->query(mkCountQuery($query));
		return $adb->query_result($list_result_rows, 0, 'count');
	}

	$list_result = $adb->query($query);

	$noofrows = $adb->num_rows($list_result);

	if (isset($_REQUEST['start']) && $_REQUEST['start'] != '') {
		$start = vtlib_purify($_REQUEST['start']);
	} else {
		$start = 1;
	}

	$navigation_array = getNavigationValues($start, $noofrows, $list_max_entries_per_page);

	if ($navigation_array['start'] == 1) {
		if ($noofrows != 0) {
			$start_rec = $navigation_array['start'];
		} else {
			$start_rec = 0;
		}
		if ($noofrows > $list_max_entries_per_page) {
			$end_rec = $navigation_array['start'] + $list_max_entries_per_page - 1;
		} else {
			$end_rec = $noofrows;
		}
	} else {
		if ($navigation_array['next'] > $list_max_entries_per_page) {
			$start_rec = $navigation_array['next'] - $list_max_entries_per_page;
			$end_rec = $navigation_array['next'] - 1;
		} else {
			$start_rec = $navigation_array['prev'] + $list_max_entries_per_page;
			$end_rec = $noofrows;
		}
	}

	$focus = new SalesOrder();

	$title=array('myTopSalesOrders.gif',$current_module_strings['LBL_MY_TOP_SO'],'home_mytopso');
	$controller = new ListViewController($adb, $current_user, $queryGenerator);
	$controller->setHeaderSorting(false);
	$header = $controller->getListViewHeader($focus, $currentModule, $url_string, $sorder, $order_by, true);

	$entries = $controller->getListViewEntries($focus, $currentModule, $list_result, $navigation_array, true);

	return array('ModuleName'=>'SalesOrder', 'Title'=>$title, 'Header'=>$header, 'Entries'=>$entries, 'search_qry'=>$search_qry);
}

function getTopSalesOrderSearch($output) {
	global $current_user;
	$currentDateTime = new DateTimeField(date('Y-m-d H:i:s'));

	$output['query'] = 'true';
	$output['searchtype'] = 'advance';

	$advft_criteria_groups = array('1' => array('groupcondition' => null));
	$advft_criteria = array(
		array (
			'groupid' => 1,
			'columnname' => 'vtiger_salesorder:duedate:duedate:SalesOrder_Due_Date:D',
			'comparator' => 'h',
			'value' => $currentDateTime->getDisplayDate(),
			'columncondition' => 'and'
		),
		array (
			'groupid' => 1,
			'columnname' => 'vtiger_crmentity:smownerid:assigned_user_id:SalesOrder_Assigned_To:V',
			'comparator' => 'e',
			'value' => getFullNameFromArray('Users', $current_user->column_fields),
			'columncondition' => null
		)
	);

	$output['advft_criteria'] = json_encode($advft_criteria);
	$output['advft_criteria_groups'] = json_encode($advft_criteria_groups);

	return $output;
}
?>
