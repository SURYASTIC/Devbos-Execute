<?php
/*************************************************************************************************
 * Copyright 2022 JPL TSolucio, S.L. -- This file is a part of TSOLUCIO coreBOS Customizations.
* Licensed under the vtiger CRM Public License Version 1.1 (the "License"); you may not use this
* file except in compliance with the License. You can redistribute it and/or modify it
* under the terms of the License. JPL TSolucio, S.L. reserves all rights not expressly
* granted by the License. coreBOS distributed by JPL TSolucio S.L. is distributed in
* the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
* warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. Unless required by
* applicable law or agreed to in writing, software distributed under the License is
* distributed on an "AS IS" BASIS, WITHOUT ANY WARRANTIES OR CONDITIONS OF ANY KIND,
* either express or implied. See the License for the specific language governing
* permissions and limitations under the License. You may obtain a copy of the License
* at <http://corebos.org/documentation/doku.php?id=en:devel:vpl11>
*************************************************************************************************/

class servicecontracttermsandconditions extends cbupdaterWorker {

	public function applyChange() {
		if ($this->hasError()) {
			$this->sendError();
		}
		if ($this->isApplied()) {
			$this->sendMsg('Changeset '.get_class($this).' already applied!');
		} else {
			$moduleInstance = Vtiger_Module::getInstance('cbTermConditions');
			if ($moduleInstance) {
				$this->sendMsg('This changeset adds Terms and Conditions as a detail of Service Contracts');
				// Fields preparations
				$fieldLayout = array(
					'cbTermConditions' => array(
						'LBL_CBTERMCONDITIONS_INFORMATION' => array(
							'srvcto' => array(
								'columntype'=>'INT(11)',
								'typeofdata'=>'V~O',
								'uitype'=>10,
								'label' => 'ServiceContracts',
								'displaytype'=>'1',
								'mods' => array('ServiceContracts'),
							),
							'copyfrom' => array(
								'columntype'=>'INT(11)',
								'typeofdata'=>'V~O',
								'uitype'=>10,
								'label' => 'Copy From',
								'displaytype'=>'1',
								'mods' => array('cbTermConditions'),
							),
						),
					),
				);
				$this->massCreateFields($fieldLayout);
				$field = Vtiger_Field::getInstance('formodule', $moduleInstance);
				if ($field) {
					$field->setPicklistValues(array('ServiceContracts'));
				}
				$this->sendMsg('Changeset '.get_class($this).' applied!');
				$this->markApplied(false);
			} else {
				$this->sendMsgError('Changeset '.get_class($this).' could not be applied yet. Please launch again.');
			}
		}
		$this->finishExecution();
	}
}