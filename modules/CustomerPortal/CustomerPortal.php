<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class CustomerPortal {

	public $moduleIcon = array('library' => 'standard', 'containerClass' => 'slds-icon_container slds-icon-standard-account', 'class' => 'slds-icon', 'icon'=>'portal');

	/**
	* Invoked when special actions are performed on the module.
	* @param string Module name
	* @param string Event Type
	*/
	public function vtlib_handler($moduleName, $eventType) {
		require_once 'include/utils/utils.php';
		global $adb;

		if ($eventType == 'module.postinstall') {
			$portalModules = array('HelpDesk','Faq','Invoice','Quotes','Products','Services','Documents',
									'Contacts','Accounts','Project','ProjectTask','ProjectMilestone','Assets');

			$res = $adb->pquery('SELECT max(sequence) AS max_tabseq FROM vtiger_customerportal_tabs', array());
			$tabseq = $adb->query_result($res, 0, 'max_tabseq');
			$i = ++$tabseq;
			foreach ($portalModules as $module) {
				$tabIdResult = $adb->pquery('SELECT tabid FROM vtiger_tab WHERE name=?', array($module));
				$tabId = $adb->query_result($tabIdResult, 0, 'tabid');
				if ($tabId) {
					++$i;
					$adb->query("INSERT INTO vtiger_customerportal_tabs (tabid,visible,sequence) VALUES ($tabId,1,$i)");
					$adb->query("INSERT INTO vtiger_customerportal_prefs(tabid,prefkey,prefvalue) VALUES ($tabId,'showrelatedinfo',1)");
				}
			}

			$adb->query("INSERT INTO vtiger_customerportal_prefs(tabid,prefkey,prefvalue) VALUES (0,'userid',1)");
			$adb->query("INSERT INTO vtiger_customerportal_prefs(tabid,prefkey,prefvalue) VALUES (0,'defaultassignee',1)");

			// Mark the module as Standard module
			$adb->pquery('UPDATE vtiger_tab SET customized=0 WHERE name=?', array($moduleName));

			$fieldid = $adb->getUniqueID('vtiger_settings_field');
			$blockid = getSettingsBlockId('LBL_OTHER_SETTINGS');
			$seq_res = $adb->pquery('SELECT max(sequence) AS max_seq FROM vtiger_settings_field WHERE blockid = ?', array($blockid));
			if ($adb->num_rows($seq_res) > 0) {
				$cur_seq = $adb->query_result($seq_res, 0, 'max_seq');
				if ($cur_seq != null) {
					$seq = $cur_seq + 1;
				}
			}
			$cpurl = 'index.php?module=CustomerPortal&action=index';
			$adb->pquery(
				'INSERT INTO vtiger_settings_field(fieldid, blockid, name, iconpath, description, linkto, sequence) VALUES (?,?,?,?,?,?,?)',
				array($fieldid, $blockid, 'LBL_CUSTOMER_PORTAL', 'portal_icon.png', 'PORTAL_EXTENSION_DESCRIPTION', $cpurl, $seq)
			);
		} elseif ($eventType == 'module.disabled') {
		// Handle actions when this module is disabled.
		} elseif ($eventType == 'module.enabled') {
		// Handle actions when this module is enabled.
		} elseif ($eventType == 'module.preuninstall') {
		// Handle actions when this module is about to be deleted.
		} elseif ($eventType == 'module.preupdate') {
		// Handle actions before this module is updated.
		} elseif ($eventType == 'module.postupdate') {
		// Handle actions after this module is updated.
		}
	}
}
?>
