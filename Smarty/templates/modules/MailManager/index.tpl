{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ('License'); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}
{include file='Buttons_List.tpl'}
<script type='text/javascript' src='include/ckeditor/ckeditor.js'></script>
<script type='text/javascript' src='modules/MailManager/resources/jquery.tokeninput.js'></script>
<link rel='stylesheet' type='text/css' href='modules/MailManager/resources/token-input-facebook.css'>
<script type='text/javascript' src='modules/MailManager/MailManager.js'></script>
<script type="text/javascript" src="include/js/ListView.js"></script>

{* Parse the translation string applicable to javascript *}
<script type='text/javascript'>
var MailManageri18nInfo = {ldelim}{rdelim};
{foreach item=i18nValue key=i18nKey from=$MOD}
	{if strpos($i18nKey, 'JSLBL_') === 0}
		MailManageri18nInfo['{$i18nKey}'] = '{$i18nValue}';
	{/if}
{/foreach}
var emailSignature = `{$emailSignature}`;
var emailSignatureBeforeQuote = {$emailSignatureBeforeQuote};
</script>

<table style="width:98%;margin:auto;">
<tr>
	<td class='showPanelBg' valign='top' >

		<div id='_progress_' style='float: right; display: none; position: absolute; right: 35px; font-weight: bold;'>
		<span id='_progressmsg_'>...</span><img src="{'vtbusy.gif'|@vtiger_imageurl:$THEME}" border='0' align='absmiddle'></div>

		<div style='padding: 20px 5px 20px 20px; min-height: 300px;' id='_mailmanagermaindiv_'>
			<table width="100%" cellpadding=0 cellspacing=0 align=left>
			<tr valign=top>
				<td nowrap="nowrap" width="15%" class='noprint'>
					<div id="_quicklinks_mainuidiv_">{include file="modules/MailManager/Mainui.QuickLinks.tpl"}</div>
					<div id='_folderprogress_' style='float: right; display: none; position: absolute;left: 30px; font-weight: bold;'>
						<span>{$MOD.JSLBL_LOADING_FOLDERS}</span><img src="{'vtbusy.gif'|@vtiger_imageurl:$THEME}" border='0' align='absmiddle'>
					</div>
					<div id="_mainfolderdiv_">
					</div>
				</td>
				<td width="85%">
						<div id="_contentdiv_"></div>
						<div id="_contentdiv2_"></div>
						<div id="_settingsdiv_"></div>
						<div id="_relationpopupdiv_" style="display:none;position:absolute;width:800px;z-index:80000;"></div>
						<div id="_replydiv_" style="display:none;">
							{include file="modules/MailManager/Mail.Send.tpl"}
						</div>
						<div id="replycontentdiv" style="display:none;">
							{include file="modules/MailManager/Mail.Send.tpl"}
						</div>
				</td>
			</tr>
			</table>
		</div>
		<div id = '__vtiger__'></div>
	</td>
</tr>
</table>

<script type='text/javascript'>
{literal}
	jQuery( window ).on('load', MailManager.mainui);
{/literal}
</script>
<input type="hidden" name="module" value="MailManager">
