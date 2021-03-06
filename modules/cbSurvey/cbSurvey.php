<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
require_once 'data/CRMEntity.php';
require_once 'data/Tracker.php';

class cbSurvey extends CRMEntity {
	public $table_name = 'vtiger_cbsurvey';
	public $table_index= 'cbsurveyid';
	public $column_fields = array();

	/** Indicator if this is a custom module or standard module */
	public $IsCustomModule = true;
	public $HasDirectImageField = false;
	public $moduleIcon = array('library' => 'standard', 'containerClass' => 'slds-icon_container slds-icon-standard-survey', 'class' => 'slds-icon', 'icon'=>'survey');

	/**
	 * Mandatory table for supporting custom fields.
	 */
	public $customFieldTable = array('vtiger_cbsurveycf', 'cbsurveyid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	public $tab_name = array('vtiger_crmentity', 'vtiger_cbsurvey', 'vtiger_cbsurveycf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	public $tab_name_index = array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_cbsurvey'   => 'cbsurveyid',
		'vtiger_cbsurveycf' => 'cbsurveyid',
	);

	/**
	 * Mandatory for Listing (Related listview)
	 */
	public $list_fields = array(
		/* Format: Field Label => array(tablename => columnname) */
		// tablename should not have prefix 'vtiger_'
		'cbsurvey_no'=> array('cbsurvey' => 'cbsurvey_no'),
		'cbsurveyname'=> array('cbsurvey' => 'cbsurveyname'),
		'cbsurveyprovider'=> array('cbsurvey' => 'cbsurveyprovider'),
		'cbsurveystart'=> array('cbsurvey' => 'cbsurveystart'),
		'cbsurveyend'=> array('cbsurvey' => 'cbsurveyend'),
		'Assigned To' => array('crmentity' => 'smownerid')
	);
	public $list_fields_name = array(
		/* Format: Field Label => fieldname */
		'cbsurvey_no'=> 'cbsurvey_no',
		'cbsurveyname'=> 'cbsurveyname',
		'cbsurveyprovider'=> 'cbsurveyprovider',
		'cbsurveystart'=> 'cbsurveystart',
		'cbsurveyend'=> 'cbsurveyend',
		'Assigned To' => 'assigned_user_id'
	);

	// Make the field link to detail view from list view (Fieldname)
	public $list_link_field = 'cbsurveyname';

	// For Popup listview and UI type support
	public $search_fields = array(
		/* Format: Field Label => array(tablename => columnname) */
		// tablename should not have prefix 'vtiger_'
		'cbsurvey_no'=> array('cbsurvey' => 'cbsurvey_no'),
		'cbsurveyname'=> array('cbsurvey' => 'cbsurveyname'),
		'cbsurveyprovider'=> array('cbsurvey' => 'cbsurveyprovider'),
		'cbsurveystart'=> array('cbsurvey' => 'cbsurveystart'),
		'cbsurveyend'=> array('cbsurvey' => 'cbsurveyend'),
	);
	public $search_fields_name = array(
		/* Format: Field Label => fieldname */
		'cbsurvey_no'=> 'cbsurvey_no',
		'cbsurveyname'=> 'cbsurveyname',
		'cbsurveyprovider'=> 'cbsurveyprovider',
		'cbsurveystart'=> 'cbsurveystart',
		'cbsurveyend'=> 'cbsurveyend'
	);

	// For Popup window record selection
	public $popup_fields = array('cbsurveyname');

	// Placeholder for sort fields - All the fields will be initialized for Sorting through initSortFields
	public $sortby_fields = array();

	// For Alphabetical search
	public $def_basicsearch_col = 'cbsurveyname';

	// Column value to use on detail view record text display
	public $def_detailview_recname = 'cbsurveyname';

	// Required Information for enabling Import feature
	public $required_fields = array('cbsurveyname'=>1);

	// Callback function list during Importing
	public $special_functions = array('set_import_assigned_user');

	public $default_order_by = 'cbsurveyname';
	public $default_sort_order='ASC';
	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	public $mandatory_fields = array('createdtime', 'modifiedtime', 'cbsurveyname');

	public function save_module($module) {
		if ($this->HasDirectImageField) {
			$this->insertIntoAttachment($this->id, $module);
		}
	}

	/**
	 * Invoked when special actions are performed on the module.
	 * @param string Module name
	 * @param string Event Type (module.postinstall, module.disabled, module.enabled, module.preuninstall)
	 */
	public function vtlib_handler($modulename, $event_type) {
		if ($event_type == 'module.postinstall') {
			// Handle post installation actions
			$this->setModuleSeqNumber('configure', $modulename, 'srvy-', '0000001');
		} elseif ($event_type == 'module.disabled') {
			// Handle actions when this module is disabled.
		} elseif ($event_type == 'module.enabled') {
			// Handle actions when this module is enabled.
		} elseif ($event_type == 'module.preuninstall') {
			// Handle actions when this module is about to be deleted.
		} elseif ($event_type == 'module.preupdate') {
			// Handle actions before this module is updated.
		} elseif ($event_type == 'module.postupdate') {
			// Handle actions after this module is updated.
		}
	}
}
?>
