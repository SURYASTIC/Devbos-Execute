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
<br>
<script type="text/javascript">
	var rel_fields = {$REL_FIELDS};
</script>
<script type="text/javascript" src="modules/Reports/Reports.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="jscalendar/calendar-win2k-cold-1.css">
<link rel="stylesheet" type="text/css" media="all" href="include/chart.js/Chart.min.css">
<script type="text/javascript" src="jscalendar/calendar.js"></script>
<script type="text/javascript" src="jscalendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="jscalendar/calendar-setup.js"></script>
<script type="text/javascript" src="include/calculator/calc.js"></script>
<script src="include/chart.js/Chart.min.js"></script>
<script src="include/chart.js/chartjs-plugin-datalabels.min.js"></script>
<script src="include/chart.js/chartjs-plugin-colorschemes.min.js"></script>
<a name="rpttop"></a>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
	<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	<form name="NewReport" action="index.php" method="POST" onsubmit="VtigerJS_DialogBox.block();">
	<input type="hidden" name="booleanoperator" value="5"/>
	<input type="hidden" name="record" value="{$REPORTID}"/>
	<input type="hidden" name="reload" value=""/>
	<input type="hidden" name="module" value="Reports"/>
	<input type="hidden" name="action" value="SaveAndRun"/>
	<input type="hidden" name="dlgType" value="saveAs"/>
	<input type="hidden" name="reportName"/>
	<input type="hidden" name="folderid" value="{$FOLDERID}"/>
	<input type="hidden" name="reportDesc"/>
	<input type="hidden" name="folder"/>
	<table class="small reportGenHdr mailClient mailClientBg" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
	<tr>
	<td style="padding: 10px; text-align: left;" width="70%">
		<span class="moduleName">{$REPORTNAME|@getTranslatedString:$MODULE}</span>&nbsp;&nbsp;
		{if $IS_EDITABLE eq 'true'}
		<input type="button" name="custReport" value="{$MOD.LBL_CUSTOMIZE_REPORT}" class="crmButton small edit" onClick="editReport('{$REPORTID}');">
		{/if}
		<br>
		<a href="index.php?module=Reports&action=ListView" class="reportMnu" style="border-bottom: 0px solid rgb(0, 0, 0);">&lt;{$MOD.LBL_BACK_TO_REPORTS}</a>
	</td>
	<td style="border-left: 2px dotted rgb(109, 109, 109); padding: 10px;" width="30%">
		<b>{$MOD.LBL_SELECT_ANOTHER_REPORT} : </b><br>
		<select name="another_report" class="detailedViewTextBox" onChange="selectReport()">
		{foreach key=report_in_fld_id item=report_in_fld_name from=$REPINFOLDER}
			<option value={$report_in_fld_id} {if $report_in_fld_id eq $REPORTID}selected{/if}>{$report_in_fld_name|@getTranslatedString:$MODULE}</option>
		{/foreach}
		</select>&nbsp;&nbsp;
	</td>
	</tr>
	</tbody>
	</table>

<!-- Generate Report UI Filter -->
<table class="small reportGenerateTable" align="center" cellpadding="5" cellspacing="0" width="95%" border=0>
	<tr>
		<td align="left" style="padding:5px" width="80%">
			<div class="slds-grid slds-m-top_small cbds-advanced-search--active" id="cbds-advanced-search">
				<div class="slds-col">
					<div class="slds-expression slds-p-bottom_xx-large slds-p-horizontal_small">
						<input type="hidden" name="advft_criteria" id="advft_criteria" value="">
						<input type="hidden" name="advft_criteria_groups" id="advft_criteria_groups" value="">
						{include file='AdvanceFilter.tpl' SOURCE='reports' MODULES_BLOCK=$COLUMNS_BLOCK_ARRAY}
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td align="center">
			<input type="button" class="small create" onclick="generateReport({$REPORTID});" value="{$MOD.LBL_GENERATE_NOW}" title="{$MOD.LBL_GENERATE_NOW}" />
			&nbsp;
			<input type="button" class="small edit" onclick="saveReportAdvFilter({$REPORTID});" value="     {$MOD.LBL_SAVE_REPORT}     " title="{$MOD.LBL_SAVE_REPORT}" />
			&nbsp;
			<input type="button" class="small edit" onclick="saveReportAs(this,'duplicateReportLayout');" value="     {$APP.LBL_SAVE_AS}     " title="{$APP.LBL_SAVE_AS}" />
		</td>
	</tr>
</table>
</form>

<table class="small reportGenHdr mailClient mailClientBg" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="right" valign="bottom" style="padding:5px">
			<a href="javascript:void(0);" onclick="location.href='index.php?module=Reports&action=SaveAndRun&record={$REPORTID}&folderid={$FOLDERID}'"><img src="{'revert.png'|@vtiger_imageurl:$THEME}" align="abmiddle" alt="{'LBL_RELOAD_REPORT'|@getTranslatedString:$MODULE}" title="{'LBL_RELOAD_REPORT'|@getTranslatedString:$MODULE}" border="0"></a>
			&nbsp;
			{if $SHOWCHARTS eq 'true'}
				<a href="javascript:void(0);" onclick="window.location.href = '#viewcharts'"><img src="{'chart_60.png'|@vtiger_imageurl:$THEME}" align="abmiddle" alt="{'LBL_VIEW_CHARTS'|@getTranslatedString:$MODULE}" title="{'LBL_VIEW_CHARTS'|@getTranslatedString:$MODULE}" border="0" width="24px"></a>
				&nbsp;
			{/if}
			{if $EXPORT_PERMITTED}
			<a href="javascript:void(0);" onclick="saveReportAs(this,'duplicateReportLayout');"><img src="{'saveas.png'|@vtiger_imageurl:$THEME}" align="abmiddle" alt="{$MOD.LBL_SAVE_REPORT_AS}" title="{$MOD.LBL_SAVE_REPORT_AS}" border="0"></a>
			&nbsp;
			<a href="javascript:void(0);" onclick="gotourl(CrearEnlace('CreatePDF',{$REPORTID}));"><img src="{'pdf-file.jpg'|@vtiger_imageurl:$THEME}" align="abmiddle" alt="{$MOD.LBL_EXPORTPDF_BUTTON}" title="{$MOD.LBL_EXPORTPDF_BUTTON}" border="0"></a>
			&nbsp;
			<a href="javascript:void(0);" onclick="gotourl(CrearEnlace('CreateXL',{$REPORTID}));"><img src="{'xls-file.jpg'|@vtiger_imageurl:$THEME}" align="abmiddle" alt="{$MOD.LBL_EXPORTXL_BUTTON}" title="{$MOD.LBL_EXPORTXL_BUTTON}" border="0"></a>
			&nbsp;
			<a href="javascript:void(0);" onclick="gotourl(CrearEnlace('CreateCSV',{$REPORTID}));"><img src="{'csv.png'|@vtiger_imageurl:$THEME}" align="abmiddle" alt="{$MOD.LBL_EXPORTCSV}" title="{$MOD.LBL_EXPORTCSV}" border="0"></a>
			&nbsp;
			<a href="javascript:void(0);" onclick="goToPrintReport({$REPORTID});"><img src="{'fileprint.png'|@vtiger_imageurl:$THEME}" align="abmiddle" alt="{$MOD.LBL_PRINT_REPORT}" title="{$MOD.LBL_PRINT_REPORT}" border="0"></a>
			{/if}
		</td>
	</tr>
</table>

<div style="display: block;" id="Generate" align="center">
	{include file="ReportRunContents.tpl"}
</div>
<br>

</td>
</tr>
</table>

{include file='modules/Reports/duplicateReportLayout.tpl'}
<svg xmlns="http://www.w3.org/2000/svg">
	<defs id="defs4">
		<linearGradient id="linearGradient5734">
			<stop id="stop5736" offset="0" style="stop-color:#000000;stop-opacity:1;"/>
			<stop id="stop5738" offset="1" style="stop-color:#000000;stop-opacity:0;"/>
		</linearGradient>
		<linearGradient gradientUnits="userSpaceOnUse" y2="401.38965" x2="378.55865" y1="103.95506" x1="378.49722" id="linearGradient5740" xlink:href="#linearGradient5734"/>
	</defs>
	<symbol id="check" viewBox="0 0 453.27828 453.27829">
		<g id="layer1" transform="translate(-73.744 30.066)">
			<path id="path4142" stroke-linejoin="round" d="m118.75 173.76 135.82 130.91 227.44-215.99" stroke="#000" stroke-linecap="round" stroke-width="40" fill="none"/>
		</g>
	</symbol>
	<symbol id="manager" viewBox="117 301 80 95"><path d=" M 118.2775 394.75 C 118.935 379.475 131.5675 367.25 147 367.25 L 167 367.25 C 182.4325 367.25 195.0675 379.475 195.72250000000003 394.75 L 118.2775 394.75 Z " fill="rgb(255,255,255)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 167 368.5 C 181.3225 368.5 193.12 379.5025 194.3875 393.5 L 119.6125 393.5 C 120.88 379.5025 132.6775 368.5 147 368.5 L 167 368.5 Z  M 167 366 L 147 366 C 130.4325 366 117 379.4325 117 396 L 197 396 C 197 379.4325 183.5675 366 167 366 L 167 366 Z " fill-rule="evenodd" fill="rgb(120,139,156)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 145.75 368.0475 L 145.75 354.75 L 168.25 354.75 L 168.25 368.0475 L 157 376.9075 L 145.75 368.0475 Z " fill="rgb(232,212,123)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 167 356 L 167 367.4425 L 157 375.32 L 147 367.4425 L 147 356 L 167 356 Z  M 169.5 353.5 L 144.5 353.5 L 144.5 368.655 L 157 378.5 L 169.5 368.655 L 169.5 353.5 L 169.5 353.5 Z " fill-rule="evenodd" fill="rgb(186,155,72)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 163.5025 372.5475 L 157 374.2625 L 150.5025 372.5575 L 154.5 381 L 149.5 396 L 164.5 396 L 159.5 381 L 163.5025 372.5475 Z " fill="rgb(78,122,181)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 174.85750000000002 346.53499999999997 C 171.60750000000002 346.53499999999997 168.965 343.8925 168.965 340.645 C 168.965 337.3975 171.61 334.7525 174.85750000000002 334.7525 C 179.765 334.7525 180.75 336.095 180.75 338.2625 C 180.75 341.795 177.8375 346.53499999999997 174.85750000000002 346.53499999999997 Z  M 139.14249999999998 346.53499999999997 C 136.1625 346.53499999999997 133.25 341.795 133.25 338.26 C 133.25 336.0925 134.235 334.75 139.14249999999998 334.75 C 142.39249999999998 334.75 145.035 337.395 145.035 340.6425 C 145.035 343.89 142.39249999999998 346.53499999999997 139.14249999999998 346.53499999999997 Z " fill-rule="evenodd" fill="rgb(232,212,123)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 174.85750000000002 336 C 179.5 336 179.5 337.2025 179.5 338.2625 C 179.5 341.34749999999997 176.89749999999998 345.2875 174.85750000000002 345.2875 C 172.2975 345.2875 170.215 343.205 170.215 340.645 C 170.215 338.0825 172.2975 336 174.85750000000002 336 Z  M 139.14249999999998 336 C 141.7025 336 143.785 338.0825 143.785 340.6425 C 143.785 343.2025 141.7025 345.28499999999997 139.14249999999998 345.28499999999997 C 137.1025 345.28499999999997 134.5 341.34749999999997 134.5 338.26 C 134.5 337.2025 134.5 336 139.14249999999998 336 Z  M 174.85750000000002 333.5 C 170.9125 333.5 167.715 336.6975 167.715 340.6425 C 167.715 344.5875 170.9125 347.78499999999997 174.85750000000002 347.78499999999997 C 178.8025 347.78499999999997 182 342.205 182 338.26 C 182 334.3175 178.8025 333.5 174.85750000000002 333.5 L 174.85750000000002 333.5 Z  M 139.14249999999998 333.5 C 135.1975 333.5 132 334.3175 132 338.2625 C 132 342.2075 135.1975 347.7875 139.14249999999998 347.7875 C 143.0875 347.7875 146.285 344.59000000000003 146.285 340.645 C 146.285 336.7 143.0875 333.5 139.14249999999998 333.5 L 139.14249999999998 333.5 Z " fill-rule="evenodd" fill="rgb(186,155,72)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 157 364.75 C 155.49 364.75 154.0725 364.205 152.8975 363.1725 L 152.6725 362.975 L 152.38 362.90250000000003 C 144.06 360.79 138.25 353.3275 138.25 344.75 L 138.25 321.5025 C 138.25 316.9375 141.965 313.2225 146.53 313.2225 L 167.4675 313.2225 C 172.035 313.2225 175.7475 316.9375 175.7475 321.5025 L 175.7475 344.75 C 175.7475 353.3275 169.9375 360.79 161.6175 362.90250000000003 L 161.325 362.975 L 161.1 363.1725 C 159.9275 364.205 158.51 364.75 157 364.75 Z " fill="rgb(255,238,163)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 167.4675 314.4725 C 171.345 314.4725 174.5 317.6275 174.5 321.505 L 174.5 344.75 C 174.5 352.7525 169.0775 359.7175 161.3125 361.69 L 160.73000000000002 361.8375 L 160.2775 362.235 C 159.62 362.8125 158.52 363.5 157 363.5 C 155.48 363.5 154.38 362.8125 153.7225 362.235 L 153.26999999999998 361.8375 L 152.6875 361.69 C 144.9225 359.7175 139.5 352.7525 139.5 344.75 L 139.5 321.505 C 139.5 317.6275 142.655 314.4725 146.5325 314.4725 L 167.4675 314.4725 Z  M 167.4675 311.9725 L 146.53 311.9725 C 141.26749999999998 311.9725 137 316.24 137 321.505 L 137 344.75 C 137 354.0925 143.415 361.915 152.0725 364.1125 C 153.39249999999998 365.2725 155.10500000000002 366 157 366 C 158.89499999999998 366 160.60750000000002 365.2725 161.9275 364.1125 C 170.585 361.915 177 354.0925 177 344.75 L 177 321.505 C 177 316.24 172.73250000000002 311.9725 167.4675 311.9725 L 167.4675 311.9725 Z " fill-rule="evenodd" fill="rgb(186,155,72)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 175.75 342.25 L 175.75 333.5 C 175.75 324.4125 168.16500000000002 319.545 167.8425 319.3425 L 166.8475 318.7175 L 166.16 319.6775 C 165.95 319.9725 160.8625 326.8925 149.875 326.8925 C 147 326.8925 138.25 326.8925 138.25 336.0025 L 138.25 342.2525 L 137.8025 342.2525 C 136.7125 339.8 133.25 331.4225 133.25 324.2825 C 133.25 311.105 142.29250000000002 302.2525 155.75 302.2525 C 165.3475 302.2525 168.23000000000002 308.715 168.35 308.99 L 168.675 309.7475 L 169.5 309.75 C 173.6775 309.75 180.75 312.6525 180.75 323.5375 C 180.75 330.09000000000003 177.23250000000002 339.5225 176.155 342.25 L 175.75 342.25 Z " fill="rgb(255,196,156)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/><path d=" M 155.75 303.5 C 164.4575 303.5 167.095 309.2425 167.1925 309.4625 L 167.835 311 L 169.5 311 C 174.1125 311 179.5 314.2825 179.5 323.5375 C 179.5 327.3775 178.23250000000002 332.2825 177 336.145 L 177 333.5 C 177 323.7275 168.85500000000002 318.5025 168.5075 318.2825 L 166.505 317.025 L 165.1375 318.955 C 165.09 319.0225 160.285 325.64 149.875 325.64 C 141.3325 325.6425 137 329.1275 137 336 L 137 336.78499999999997 C 135.7725 333.23 134.5 328.5225 134.5 324.2775 C 134.5 311.85 143.04 303.5 155.75 303.5 Z  M 155.75 301 C 141.2025 301 132 310.9525 132 324.2775 C 132 333.105 137 343.5 137 343.5 L 139.5 343.5 C 139.5 343.5 139.5 338.4275 139.5 336 C 139.5 329.33 144.56 328.1425 149.875 328.1425 C 161.7 328.1425 167.18 320.4 167.18 320.4 C 167.18 320.4 174.5 324.9975 174.5 333.5 C 174.5 336.1725 174.5 343.5 174.5 343.5 L 177 343.5 C 177 343.5 182 331.58 182 323.5375 C 182 312.245 174.8075 308.5 169.5 308.5 C 169.5 308.5 166.3675 301 155.75 301 L 155.75 301 Z " fill-rule="evenodd" fill="rgb(161,106,74)" stroke-width="2.5" stroke="rgba(0,0,0,0)" stroke-linejoin="miter" stroke-linecap="butt"/>
	</symbol>
	<symbol id="search" viewBox="0 0 512 512">
		<g>
			<path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"/>
		</g>
	</symbol>
	<symbol id="spinner" viewBox="0 0 504.00507 504.00507">
		<g transform="translate(-2.1885086,-7.7344675)" id="g5742">
			<path style="opacity:1;fill:url(#linearGradient5740);fill-opacity:1;stroke:none;stroke-width:6.00006056;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 407.4375,68.570312 -70.66992,46.152348 a 169.04575,169.04575 0 0 1 86.46484,147.41992 169.04575,169.04575 0 0 1 -65.18359,133.2793 l 47.0039,61.77343 A 246.89575,246.89575 0 0 0 501.08398,262.14258 246.89575,246.89575 0 0 0 407.4375,68.570312 Z" id="path5724" transform="scale(1.0000101,1.0000101)"/>
			<path style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:6.00006056;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 254.20117,15.234375 A 246.89575,246.89575 0 0 0 7.2929688,262.14258 246.89575,246.89575 0 0 0 103.24414,457.32617 l 47.16211,-62.00976 A 169.04575,169.04575 0 0 1 85.144531,262.14258 169.04575,169.04575 0 0 1 254.20117,93.085938 169.04575,169.04575 0 0 1 336.76758,114.72266 L 407.4375,68.570312 A 246.89575,246.89575 0 0 0 254.20117,15.234375 Z" id="path4140" transform="scale(1.0000101,1.0000101)"/>
		</g>
	</symbol>
</svg>
<link rel="stylesheet" href="include/bunnyjs/css/fade.css">
<link rel="stylesheet" href="include/bunnyjs/css/svg-icons.css">
<script src="include/bunnyjs/utils-dom.min.js"></script>
<script src="include/bunnyjs/ajax.min.js"></script>
<script src="include/bunnyjs/template.min.js"></script>
<script src="include/bunnyjs/pagination.min.js"></script>
<script src="include/bunnyjs/url.min.js"></script>
<script src="include/bunnyjs/datatable.min.js"></script>
<script src="include/bunnyjs/utils-svg.min.js"></script>
<script src="include/bunnyjs/spinner.min.js"></script>
<script src="include/bunnyjs/datatable.icons.min.js"></script>
<script src="include/bunnyjs/element.min.js"></script>
<script src="include/bunnyjs/datatable.scrolltop.min.js"></script>
<script type="text/javascript">
var i18nLBL_PRINT_REPORT = "{$MOD.LBL_PRINT_REPORT}";
Pagination._config.langFirst = "{$APP.LNK_LIST_START}";
Pagination._config.langLast = "{$APP.LNK_LIST_END}";
Pagination._config.langPrevious = "< {$APP.LNK_LIST_PREVIOUS}";
Pagination._config.langNext = "{$APP.LNK_LIST_NEXT} >";
{literal}
Template.define('report_row_template', {});
Pagination._config.langStats = "{from}-{to} {/literal}{$APP.LBL_LIST_OF}{literal} {total} ({/literal}{$APP.Page}{literal} {currentPage} {/literal}{$APP.LBL_LIST_OF}{literal} {lastPage})";
DataTableConfig.loadingImg = 'themes/images/loading.svg';
DataTable.onRedraw(document.getElementsByTagName('datatable')[0], (data) => {
	if(document.getElementById('_reportrun_total')) document.getElementById('_reportrun_total').innerHTML=data.total;
});
{/literal}
</script>
