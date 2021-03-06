<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
include_once __DIR__ . '/ModCommentsCore.php';
include_once __DIR__ . '/models/Comments.php';

require_once 'include/utils/VtlibUtils.php';

class ModComments extends ModCommentsCore {

	/**
	 * Invoked when special actions are performed on the module.
	 * @param string Module name
	 * @param string Event Type (module.postinstall, module.disabled, module.enabled, module.preuninstall)
	 */
	public $moduleIcon = array('library' => 'standard', 'containerClass' => 'slds-icon_container slds-icon-standard-feedback', 'class' => 'slds-icon', 'icon'=>'feedback');

	public function vtlib_handler($modulename, $event_type) {
		parent::vtlib_handler($modulename, $event_type);
		if ($event_type == 'module.postinstall') {
			self::addWidgetTo(array('Leads', 'Contacts', 'Accounts', 'Potentials', 'Project', 'ProjectTask'));
			global $adb;
			// Mark the module as Standard module
			$adb->pquery('UPDATE vtiger_tab SET customized=0 WHERE name=?', array($modulename));
		} elseif ($event_type == 'module.postupdate') {
			self::addWidgetTo(array('Potentials'));
		}
	}

	/**
	 * Transfer the comment records from one parent record to another.
	 * @param CRMID Source parent record id
	 * @param CRMID Target parent record id
	 */
	public static function transferRecords($currentParentId, $targetParentId) {
		global $adb;
		$adb->pquery("UPDATE vtiger_modcomments SET related_to=? WHERE related_to=?", array($targetParentId, $currentParentId));
	}

	/**
	 * Get widget instance by name
	 */
	public static function getWidget($name) {
		if (($name == 'DetailViewBlockCommentWidget' || $name == 'EditViewBlockCommentWidget') && isPermitted('ModComments', 'DetailView') == 'yes') {
			require_once __DIR__ . '/widgets/DetailViewBlockComment.php';
			return (new ModComments_DetailViewBlockCommentWidget());
		}
		return false;
	}

	/**
	 * Add widget to other module.
	 * @param unknown_type $moduleNames
	 * @return unknown_type
	 */
	public static function addWidgetTo($moduleNames, $widgetType = 'DETAILVIEWWIDGET', $widgetName = 'DetailViewBlockCommentWidget') {
		if (empty($moduleNames)) {
			return;
		}

		include_once 'vtlib/Vtiger/Module.php';

		if (is_string($moduleNames)) {
			$moduleNames = array($moduleNames);
		}

		$commentWidgetModules = array();
		foreach ($moduleNames as $moduleName) {
			$module = Vtiger_Module::getInstance($moduleName);
			if ($module) {
				$module->addLink($widgetType, $widgetName, 'block://ModComments:modules/ModComments/ModComments.php');
				$commentWidgetModules[] = $moduleName;
			}
		}
		if (!empty($commentWidgetModules)) {
			$modCommentsModule = Vtiger_Module::getInstance('ModComments');
			$modCommentsModule->addLink('HEADERSCRIPT', 'ModCommentsCommonHeaderScript', 'modules/ModComments/ModCommentsCommon.js');
			$modCommentsRelatedToField = Vtiger_Field::getInstance('related_to', $modCommentsModule);
			$modCommentsRelatedToField->setRelatedModules($commentWidgetModules);
		}
	}

	/**
	 * Remove widget from other modules.
	 * @param unknown_type $moduleNames
	 * @param unknown_type $widgetType
	 * @param unknown_type $widgetName
	 * @return unknown_type
	 */
	public static function removeWidgetFrom($moduleNames, $widgetType = 'DETAILVIEWWIDGET', $widgetName = 'DetailViewBlockCommentWidget') {
		if (empty($moduleNames)) {
			return;
		}

		include_once 'vtlib/Vtiger/Module.php';

		if (is_string($moduleNames)) {
			$moduleNames = array($moduleNames);
		}

		$commentWidgetModules = array();
		foreach ($moduleNames as $moduleName) {
			$module = Vtiger_Module::getInstance($moduleName);
			if ($module) {
				$module->deleteLink($widgetType, $widgetName, "block://ModComments:modules/ModComments/ModComments.php");
				$commentWidgetModules[] = $moduleName;
			}
		}
		if (!empty($commentWidgetModules)) {
			$modCommentsModule = Vtiger_Module::getInstance('ModComments');
			$modCommentsRelatedToField = Vtiger_Field::getInstance('related_to', $modCommentsModule);
			$modCommentsRelatedToField->unsetRelatedModules($commentWidgetModules);
		}
	}

	/**
	 * Wrap this instance as a model
	 */
	public function getAsCommentModel() {
		return new ModComments_CommentsModel($this->column_fields);
	}
}
?>
