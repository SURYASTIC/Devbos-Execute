{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
 ********************************************************************************/
-->*}
{literal}
<style>
DIV.fixedLay{
	border:3px solid #CCCCCC;
	background-color:#FFFFFF;
	width:500px;
	position:fixed;
	left:250px;
	top:98px;
	display:block;
}
</style>
{/literal}
{literal}
<!--[if lte IE 6]>
<STYLE type=text/css>
DIV.fixedLay {
	POSITION: absolute;
}
</STYLE>
<![endif]-->

{/literal}
{include file="SetMenu.tpl"}
<section role="dialog" tabindex="-1" class="slds-fade-in-open slds-modal_large slds-app-launcher" aria-labelledby="header43">
<div class="slds-modal__container slds-p-around_none">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
	<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	<br>

	<div align=center>
				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
				<tr>
					<td width=50 rowspan=2 valign=top class="cblds-p_none"><img src="{'shareaccess.gif'|@vtiger_imageurl:$THEME}" alt="{$MOD.LBL_USERS}" width="48" height="48" border=0 title="{$MOD.LBL_USERS}"></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index">{'LBL_SETTINGS'|@getTranslatedString}</a> > {$MOD.LBL_SHARING_ACCESS} </b></td>
					<td rowspan=2 class="small" align=right>&nbsp;</td>
				</tr>
				<tr>
					<td valign=top class="small cblds-p-v_none">{$MOD.LBL_SHARING_ACCESS_DESCRIPTION}</td>
				</tr>
				</table>

				<br>
				<div class='helpmessagebox' style='margin-bottom: 4px;'>
					<b style='color: red;'>{$APP.NOTE}</b> {$MOD.LBL_SHARING_ACCESS_HELPNOTE}
				</div>
				<!-- GLOBAL ACCESS MODULE -->
				<div id="globaldiv">
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
				<form action="index.php" method="post" name="new" id="orgSharingform" onsubmit="VtigerJS_DialogBox.block();">
				<input type="hidden" name="module" value="Users">
				<input type="hidden" name="action" value="OrgSharingEditView">
				<tr>
					<td class="big"><strong>1. {$CMOD.LBL_GLOBAL_ACCESS_PRIVILEGES}</strong></td>
					<td class="small cblds-t-align_right" align=right>
						<input class="crmButton small cancel" title="{$CMOD.LBL_RECALCULATE_BUTTON}"  type="button" name="recalculate" value="{$CMOD.LBL_RECALCULATE_BUTTON}" onclick="return freezeBackground();">
	&nbsp;<input class="crmButton small edit" type="submit" name="Edit" value="{$CMOD.LBL_CHANGE} {$CMOD.LBL_PRIVILEGES}" ></td>
					</td>
				</tr>
				</table>
				<table cellspacing="0" cellpadding="5" class="listTable" width="100%">
				{foreach item=module from=$DEFAULT_SHARING}
				  {assign var="MODULELABEL" value=$module.0|getTranslatedString:$module.0}
                  <tr>
                    <td width="20%" class="colHeader small cblds-p-v_medium" nowrap>{$MODULELABEL}</td>
                    <td width="30%" class="listTableRow small cblds-p-v_medium" nowrap>
					{if $module.1 neq 'Private' && $module.1 neq 'Hide Details'}
						<img src="{'public.gif'|@vtiger_imageurl:$THEME}" align="absmiddle">
					{else}
						<img src="{'private.gif'|@vtiger_imageurl:$THEME}" align="absmiddle">
					{/if}
						{$CMOD[$module.1]}
					</td>
                    <td width="50%" class="listTableRow small cblds-p-v_medium" nowrap>{$module.2}</td>
                  </tr>
				{/foreach}
		</form>
              </table>
		</div>
		  <!-- END OF GLOBAL -->
				<br><br>
		  <!-- Custom Access Module Display Table -->
		  <div id="customdiv">
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
				<tr>
					<td class="big"><strong>2. {$CMOD.LBL_CUSTOM_ACCESS_PRIVILEGES}</strong></td>
					<td class="small" align=right>&nbsp;</td>
				</tr>
				</table>
				<!-- Start of Module Display -->
				{foreach  key=modulename item=details from=$MODSHARING}
				{assign var="MODULELABEL" value=$modulename|@getTranslatedString:$modulename}
				{assign var="mod_display" value=$MODULELABEL}
				{if $mod_display eq $APP.Accounts}
					{assign var="xx" value=$APP.Contacts}
					{assign var="mod_display" value=$mod_display|cat:" & $xx"}
				{/if}
				{if !empty($details.0)}
				<table width="100%" border="0" cellpadding="5" cellspacing="0" class="listTableTopButtons">
                  		<tr>
		                    <td  style="padding-left:5px;" class="big"><img src="{'arrow.jpg'|@vtiger_imageurl:$THEME}" width="19" height="21" align="absmiddle" />&nbsp; <b>{$mod_display}</b>&nbsp; </td>
                		    <td align="right" class="cblds-t-align_right">
					<input class="crmButton small save" type="button" name="Create" value="{$CMOD.LBL_ADD_PRIVILEGES_BUTTON}" onClick="callEditDiv(this,'{$modulename}','create','','{$MODULELABEL}')">
				    </td>
                  		</tr>
			  	</table>
				<table width="100%" cellpadding="5" cellspacing="0" class="listTable" >
                    		<tr>
                    		<td width="7%" class="colHeader small" nowrap>{$CMOD.LBL_RULE_NO}</td>
                          	<td width="20%" class="colHeader small" nowrap><a href="index.php?action=OrgSharingDetailView&module=Settings&sortrulesby=1">{$mod_display} {$CMOD.LBL_OF}</a></td>
                          	<td width="25%" class="colHeader small" nowrap><a href="index.php?action=OrgSharingDetailView&module=Settings&sortrulesby=2">{$CMOD.LBL_CAN_BE_ACCESSED}</a></td>
                          	<td width="40%" class="colHeader small" nowrap>{$CMOD.LBL_PRIVILEGES}</td>
                          	<td width="8%" class="colHeader small" nowrap>{$APP.Tools}</td>
                        	</tr>
                        <tr >
			  {foreach key=sno item=elements from=$details}
                          <td class="listTableRow small">{$sno+1}</td>
                          <td class="listTableRow small">{$elements.1}</td>
                          <td class="listTableRow small">{$elements.2}</td>
                          <td class="listTableRow small">{$elements.3}</td>
                          <td align="center" class="listTableRow small">
				<a href="javascript:void(0);" onClick="callEditDiv(this,'{$modulename}','edit','{$elements.0}','{$MODULELABEL}')"><img src="{'editfield.gif'|@vtiger_imageurl:$THEME}" title='edit' align="absmiddle" border=0 style="padding-top:3px;"></a>&nbsp;|<a href='javascript:confirmdelete("index.php?module=Users&action=DeleteSharingRule&shareid={$elements.0}")'><img src="{'delete.gif'|@vtiger_imageurl:$THEME}" title='del' align="absmiddle" border=0></a></td>
                        </tr>

                     {/foreach}
                    </table>
	<!-- End of Module Display -->
	<!-- Start FOR NO DATA -->

			<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
			<tr><td>&nbsp;</td></tr>
			</table>
		    {else}
                    <table width="100%" cellpadding="0" cellspacing="0" class="listTable"><tr><td>
		      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="listTableTopButtons">
                      <tr>
                        <td  style="padding-left:5px;" class="big"><img src="{'arrow.jpg'|@vtiger_imageurl:$THEME}" width="19" height="21" align="absmiddle" />&nbsp; <b>{$mod_display}</b>&nbsp; </td>
                        <td align="right" class="cblds-t-align_right">
				<input class="crmButton small save" type="button" name="Create" value="{$APP.LBL_ADD_ITEM} {$CMOD.LBL_PRIVILEGES}" onClick="callEditDiv(this,'{$modulename}','create','','{$MODULELABEL}')">
			</td>
                      </tr>
			<table width="100%" cellpadding="5" cellspacing="0">
			<tr>
			<td colspan="2"  style="padding:20px;" align="center" class="small cblds-t-align_center">
			   {$CMOD.LBL_CUSTOM_ACCESS_MESG}
			   <a href="javascript:void(0);" onClick="callEditDiv(this,'{$modulename}','create','','{$MODULELABEL}')">{$CMOD.LNK_CLICK_HERE}</a>
			   {$CMOD.LBL_CREATE_RULE_MESG}
			</td>
			</tr>
		    </table>
		    </table>
			<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
			<tr><td>&nbsp;</td></tr>
			</table>
		    {/if}
		    {/foreach}
		   </td></tr></table>
				<br>
		   </div>
		</td>
		</tr>
		</table>
			</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
	</div>
</td>
   </tr>
</tbody>
</table>
<div id="tempdiv" style="display:block;position:absolute;width:400px;"></div>

<!-- For Disabling Window -->
<div id="confId"  class='veil_new small' style="display:none;">
<table class="options small" border="0" cellpadding="18" cellspacing="0">
<tr>
	<td align="center" class="cblds-t-align_center" nowrap style="color:#FFFFFF;font-size:15px;">
		<b>{$CMOD.LBL_RECALC_MSG}</b>
	</td>
	<br>
	<tr>
		<td align="center" class="cblds-t-align_center">
			<input type="button" style="color: #000000;" value="{$CMOD.LBL_YES}" onclick="return disableStyle('confId');">&nbsp;&nbsp;
			<input type="button" value="&nbsp;{$CMOD.LBL_NO}&nbsp;" style="color: #000000;" onclick="showSelect();document.getElementById('confId').style.display='none';document.body.removeChild(document.getElementById('freeze'));">
		</td>
	</tr>
</tr>
</table>
</div>

<div id="divId" class="veil_new" style="position:absolute;width:100%;display:none;top:0px;left:0px;">
<table border="5" cellpadding="0" cellspacing="0" align="center" style="vertical-align:middle;width:100%;height:100%;">
<tbody><tr>
	<td class="big cblds-t-align_center" align="center">
		<img src="{'plsWaitAnimated.gif'|@vtiger_imageurl:$THEME}">
	</td>
</tr></tbody>
</table>
</div>
</div>
</section>
<script>
var i18nOrgSharing = {
	'Accounts': '{$APP.Accounts}',
	'Contacts': '{$APP.Contacts}',
	'LBL_LIST_OF': '{$APP.LBL_LIST_OF}',
	'LBL_CAN_BE_ACCESSED': '{$CMOD.LBL_CAN_BE_ACCESSED}',
	'LBL_IN_PERMISSION': '{$CMOD.LBL_IN_PERMISSION}',
	'LBL_RELATED_MODULE_RIGHTS': '{$CMOD.LBL_RELATED_MODULE_RIGHTS}',
};
</script>
