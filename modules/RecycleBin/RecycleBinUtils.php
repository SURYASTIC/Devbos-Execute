<?php
/*+********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ********************************************************************************/

function getValuesforRBColumns($column_name, $search_string) {
	global $log, $adb;
	$log->debug('> getValuesforRBColumns '.$column_name.','.$search_string);
	$sql = "select concat(tablename,':',fieldname) as tablename from vtiger_entityname where entityidfield=? or entityidcolumn=?";
	$result = $adb->pquery($sql, array($column_name));
	$tablename = $adb->query_result($result, 0, 'tablename');
	$num_rows = $adb->num_rows($result);
	if ($num_rows >= 1) {
		$val = $tablename;
		$explode_column=explode(',', $val);
		$x=count($explode_column);
		if ($x >= 1) {
			$main_tablename = explode(':', $explode_column[0]);
			$where=" $explode_column[0] like '".formatForSqlLike($search_string)."' or $main_tablename[0]$main_tablename[1] like '".formatForSqlLike($search_string)."'";
		}
	}
	$log->debug('< getValuesforRBColumns');
	return $where;
}

function RBSearch($module) {
	global $log;
	$log->debug('> RBSearch '.$module);
	$url_string='';
	if (isset($_REQUEST['search_field']) && $_REQUEST['search_field'] != '') {
		$search_column=vtlib_purify($_REQUEST['search_field']);
	}
	if (isset($_REQUEST['search_text']) && $_REQUEST['search_text']!= '') {
		$search_string=$_REQUEST['search_text'];
	}
	if (isset($_REQUEST['searchtype']) && $_REQUEST['searchtype']!= '') {
		$search_type=vtlib_purify($_REQUEST['searchtype']);
		if ($search_type == 'BasicSearch') {
			$where=basicRBsearch($module, $search_column, $search_string);
		}

		$url_string = '&search_field='.$search_column.'&search_text='.$search_string.'&searchtype=BasicSearch';
		if (!empty($_REQUEST['type'])) {
			$url_string .= '&type='.substr(trim($_REQUEST['type']), 0, 5)=='alpbt' ? 'alpbt' : 'entchar';
		}
		$log->debug('< RBSearch');
		return $where.'#@@#'.$url_string;
	}
}

function basicRBsearch($module, $search_field, $search_string) {
	global $log, $adb;
	$log->debug('> basicRBsearch '.$module.','.$search_field.','.$search_string);
	if ($search_field =='crmid') {
		$column_name='crmid';
		$where="vtiger_entity.$column_name like '".formatForSqlLike($search_string)."'";
	} else {
		//Check added for tickets by accounts/contacts in dashboard
		$search_field_first = $search_field;
		if ($module=='HelpDesk' && ($search_field == 'contactid' || $search_field == 'account_id')) {
			$search_field = 'parent_id';
		}
		//Check ends

		$tabid = getTabid($module);
		$qry = 'select vtiger_field.columnname,tablename from vtiger_field where tabid=? and (fieldname=? or columnname=?) and vtiger_field.presence in (0,2)';
		$result = $adb->pquery($qry, array($tabid,$search_field,$search_field));
		$noofrows = $adb->num_rows($result);
		if ($noofrows!=0) {
			$column_name=$adb->query_result($result, 0, 'columnname');

			//Check added for tickets by accounts/contacts in dashboard
			if ($column_name == 'parent_id') {
				if ($search_field_first	== 'account_id') {
					$search_field_first = 'accountid';
				}
				if ($search_field_first	== 'contactid') {
					$search_field_first = 'contact_id';
				}
				$column_name = $search_field_first;
			}
			//Check ends
			$table_name=$adb->query_result($result, 0, 'tablename');
			if ($table_name == 'vtiger_crmentity' && $column_name == 'smownerid') {
				$where = get_usersid($table_name, $column_name, $search_string);
			} elseif ($table_name == 'vtiger_activity' && $column_name == 'status') {
				$where="($table_name.$column_name like '".formatForSqlLike($search_string)."' or vtiger_activity.eventstatus like '".formatForSqlLike($search_string)."')";
			} elseif ($table_name == 'vtiger_pricebook' && $column_name == 'active') {
				if (stristr('yes', $search_string)) {
					$where="$table_name.$column_name = 1";
				} elseif (stristr('no', $search_string)) {
					$where="$table_name.$column_name is NULL";
				} else {
					//here where condition is added , since the $where query must go as differently so that it must give an empty set, either than Yes or No...
					$where="$table_name.$column_name = 2";
				}
			}
			$sql = "select concat(tablename,':',fieldname) as tablename from vtiger_entityname where entityidfield='$column_name' or entityidcolumn='$column_name'";
			$no_of_rows = $adb->num_rows($adb->query($sql));
			if ($no_of_rows >= 1) {
				$where = getValuesforRBColumns($column_name, $search_string);
			} elseif (($column_name != 'status' || $table_name !='vtiger_activity')
				&& ($table_name != 'vtiger_crmentity' || $column_name != 'smownerid')
				&& ($table_name != 'vtiger_pricebook' || $column_name != 'active')
			) {
				$where="$table_name.$column_name like '".formatForSqlLike($search_string) ."'";
			}
		}
	}
	if ($_REQUEST['type'] == 'entchar') {
		$search = array('Un Assigned', '%', 'like');
		$replace = array('', '', '=');
		$where= str_replace($search, $replace, $where);
	}
	if ($_REQUEST['type'] == 'alpbt') {
		$where = str_replace_once('%', '', $where);
	}
	$log->debug('< basicRBsearch');
	return $where;
}

function getSelectedRecordIds($input, $module, $idstring, $excludedRecords) {
	global $current_user, $adb;

	if ($idstring=='all') {
		$queryGenerator = new QueryGenerator($module, $current_user);

		if (isset($input['query']) && $input['query'] == 'true') {
			$queryGenerator->addUserSearchConditions($input);
		}

		$queryGenerator->setFields(array('id'));
		$query = $queryGenerator->getQuery();
		$crmEntityTable = CRMEntity::getcrmEntityTableAlias($module, true);
		$query = preg_replace("/$crmEntityTable.deleted\s*=\s*0/i", $crmEntityTable.'.deleted=1', $query);
		$result = $adb->pquery($query, array());
		$storearray = array();

		for ($i = 0; $i < $adb->num_rows($result); $i++) {
			$storearray[] = $adb->query_result($result, $i);
		}

		$excludedRecords=explode(';', $excludedRecords);
		$storearray=array_merge(array_diff($storearray, $excludedRecords));
	} else {
		$storearray = explode(';', $idstring);
	}
	return $storearray;
}
?>