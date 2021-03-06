<?php
/*************************************************************************************************
 * Copyright 2020 JPL TSolucio, S.L. -- This file is a part of TSOLUCIO coreBOS Customizations.
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
 *************************************************************************************************
 *  Module       : Workflow Expression Function Definitions
 *  Version      : 1.0

 * Definition Template *
'function name' => array( // should be aligned with function sin modules/com_vtiger_workflow/expression_engine/VTExpressionsManager.inc
	'name' => usually the same as function name but may be different, will be shown to user,
	'desc' => description of the function,
	'params' => parameters of the function, array(
		'param name' => array(
			'type' => 'String' | 'Boolean' | 'Integer' | 'Float' | 'Multiple',
			'optional' => true/false,
			'desc' => 'description of the parameter',
		)
	),
	'categories' => array of categories the function belongs to
	'examples' => array of one-line examples,
)

 # the list of categories can be found n modules/com_vtiger_workflow/expression_engine/VTExpressionsManager.inc (expressionFunctionCategories)
 *************************************************************************************************/
$WFExpressionFunctionDefinitons = array(
'concat' => array(
	'name' => 'concat(a,b,...)',
	'desc' => 'Combina varios elementos de texto en uno solo',
	'params' => array(
		'a' => array(
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'cualquier cadena de texto literal o nombre de campo v??lido',
		),
		'b' => array(
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'cualquier cadena de texto literal o nombre de campo v??lido',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"concat(firstname, ' ', lastname)",
	),
),
'coalesce' => array(
	'name' => 'coalesce(a, b,...)',
	'desc' => 'Devuelve el primer valor no vac??o encontrado en la lista de par??metros',
	'params' => array(
		array(
			'name' => 'a',
			'type' => 'M??ltiple',
			'optional' => false,
			'desc' => 'cualquier valor o nombre de campo v??lido',
		),
		array(
			'name' => 'b',
			'type' => 'M??ltiple',
			'optional' => true,
			'desc' => 'cualquier valor o nombre de campo v??lido',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		'coalesce(email1, email2)'
	),
),
'time_diffdays' => array(
	'name' => 'time_diffdays(a, b)',
	'desc' => 'Calcula la diferencia de tiempo (en d??as) entre dos campos de fecha espec??ficos',
	'params' => array(
		array(
			'name' => 'a',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'b',
			'type' => 'Fecha',
			'optional' => true,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha. si se deja vac??o, se utilizar?? la fecha actual',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		'time_diffdays(invoicedate, duedate)',
		'time_diffdays(duedate)',
	),
),
'time_diffyears' => array(
	'name' => 'time_diffyears(a, b)',
	'desc' => 'Calcula la diferencia de tiempo (en a??os) entre dos campos de fecha espec??ficos',
	'params' => array(
		array(
			'name' => 'a',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'b',
			'type' => 'Fecha',
			'optional' => true,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha. si se deja vac??o, se utilizar?? la fecha actual',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		'time_diffyears(invoicedate, duedate)',
		'time_diffyears(duedate)',
	),
),
'time_diffweekdays' => array(
	'name' => 'time_diffweekdays(a, b)',
	'desc' => 'Calcula la diferencia de tiempo (en d??as) entre dos campos de fecha espec??ficos excluyendo los fines de semana',
	'params' => array(
		array(
			'name' => 'a',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'b',
			'type' => 'Fecha',
			'optional' => true,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha. si se deja vac??o, se utilizar?? la fecha actual',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		'time_diffweekdays(invoicedate, duedate)',
		'time_diffweekdays(duedate)',
	),
),
'time_diff' => array(
	'name' => 'time_diff(a, b)',
	'desc' => 'Calcula la diferencia de tiempo (en segundos) entre dos campos de fecha espec??ficos',
	'params' => array(
		array(
			'name' => 'a',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'b',
			'type' => 'Fecha',
			'optional' => true,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha. si se deja vac??o, se utilizar?? la fecha actual',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		'time_diff(invoicedate, duedate)',
		'time_diff(duedate)',
	),
),
'holidaydifference' => array(
	'name' => 'holidaydifference(startDate, endDate, include_saturdays, holidays)',
	'desc' => 'Calcula la diferencia de tiempo (en d??as) entre dos campos de fecha espec??ficos, excluyendo s??bados y festivos si se dan. A diferencia de los d??as de red, no incluye la fecha de finalizaci??n, por lo que, por lo general, hay una diferencia de un d??a',
	'params' => array(
		array(
			'name' => 'startDate',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'endDate',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'include_saturdays',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'si se establece en 0 los s??bados no se agregar??n, si se establece en cualquier otro valor, se agregar??nd',
		),
		array(
			'name' => 'holidays',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'nombre de un mapa de informaci??n que contiene las fechas de vacaciones para excluir<br>'.nl2br(htmlentities("<map>\n<information>\n<infotype>Holidays in France 2020</infotype>\n<value>date1</value>\n<value>date2</value>\n</information>\n</map>")).'</pre>',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"holidaydifference('2020-01-01', '2020-06-30', 0, 'holidays in Spain 2020')",
		"holidaydifference('2020-01-01', '2020-06-30', 1, 'holidays in Spain 2020')",
		"holidaydifference('2020-01-01', '2020-06-30', 0, 'holidays in France 2020')",
	),
),
'networkdays' => array(
	'name' => 'networkdays(startDate, endDate, holidays)',
	'desc' => 'Devuelve el n??mero de d??as laborables completos entre start_date y end_date. Los d??as laborables excluyen los fines de semana y las fechas identificadas en festivos. A diferencia de la diferencia de vacaciones, incluye la fecha de finalizaci??n, por lo que, por lo general, hay una diferencia de un d??a',
	'params' => array(
		array(
			'name' => 'startDate',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'endDate',
			'type' => 'Fecha',
			'optional' => true,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha, se utiliza HOY si no se da',
		),
		array(
			'name' => 'holidays',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'nombre de un mapa de informaci??n que contiene las fechas de vacaciones para excluir<br>'.nl2br(htmlentities("<map>\n<information>\n<infotype>Holidays in France 2020</infotype>\n<value>date1</value>\n<value>date2</value>\n</information>\n</map>")).'</pre>',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"networkdays('2020-01-01', '2020-06-30', 'holidays in Spain 2020')",
		"networkdays('2020-01-01', '2020-06-30', 'holidays in France 2020')",
	),
),
'isholidaydate' => array(
	'name' => 'isholidaydate(date, saturdayisholiday, holidays)',
	'desc' => 'Devuelve verdadero si la fecha dada cae en un d??a festivo, domingo o s??bado. Si el s??bado se considera festivo o no se puede definir.',
	'params' => array(
		array(
			'name' => 'date',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo fecha',
		),
		array(
			'name' => 'saturdayisholiday',
			'type' => 'Booleano',
			'optional' => false,
			'desc' => 'si se establece en 1, los s??bados se considerar??n d??as no laborables (como el domingo)',
		),
		array(
			'name' => 'holidays',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'lista de vacaciones separadas por comas o el nombre de un mapa de informaci??n que contiene las fechas de vacaciones<br>'.nl2br(htmlentities("<map>\n<information>\n<infotype>Holidays in France 2020</infotype>\n<value>date1</value>\n<value>date2</value>\n</information>\n</map>")).'</pre>',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"isholidaydate('2021-01-01', 0, 'holidays in Spain 2021')",
		"isholidaydate('2021-01-01', 1, 'holidays in Spain 2021')",
		"isholidaydate('2021-01-01', 0, 'holidays in France 2021')",
	),
),
'aggregate_time' => array(
	'name' => 'aggregate_time(relatedModuleName, relatedModuleField, conditions)',
	'desc' => 'Esta funci??n devuelve un tiempo agregado de un campo en un m??dulo relacionado con filtrado opcional de los registros',
	'params' => array(
		array(
			'name' => 'relatedModuleName',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'm??dulo relacionado para agregar',
		),
		array(
			'name' => 'relatedModuleField',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'nombre del campo relacionado para agregar',
		),
		array(
			'name' => 'conditions',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'condici??n opcional usada para filtrar los registros: [field,op,value,glue],[...]',
		),
	),
	'categories' => array('Statistics'),
	'examples' => array(
		"aggregate_time('InventoryDetails','quantity*listprice')"
	),
),
'add_days' => array(
	'name' => 'add_days(datefield, noofdays)',
	'desc' => 'Calcular una nueva fecha basada en una fecha dada con un n??mero de d??as especificado a??adido',
	'params' => array(
		array(
			'name' => 'datefield',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'noofdays',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de d??as',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"add_days(2020-10-10,60)",
		"add_days(2020-10-12,40)",
	),
),
'add_workdays' => array(
	'name' => 'add_workdays(date, numofdays, addsaturday, holidays)',
	'desc' => 'Calcular una fecha de d??a laborable basado en una fecha dada con un n??mero de d??as especificado, s??bados y festivos agregados',
	'params' => array(
		array(
			'name' => 'date',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'numofdays',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de d??as',
		),
		array(
			'name' => 'addsaturday',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'if set to 0, Saturdays will not be added, if set to any other value, they will be added',
		),
		array(
			'name' => 'holidays',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'nombre de un mapa de informaci??n que contiene las fechas de vacaciones para excluir',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"add_dadd_workdaysays('2020-10-01', '40', 2, 'holidays in  2020')",
		"add_workdays('2020-10-01', '60', 3, 'holidays in  2020')",
	),
),
'sub_days' => array(
	'name' => 'sub_days(datefield, noofdays)',
	'desc' => 'Calcular una nueva fecha basada en una fecha dada con un n??mero de d??as restado',
	'params' => array(
		array(
			'name' => 'datefield',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'noofdays',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de d??as',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"sub_days(2020-10-01,60)",
		"sub_days(2020-10-01,40)",
	),
),
'sub_workdays' => array(
	'name' => 'sub_workdays(date, numofdays, removesaturday, holidays)',
	'desc' => 'Calcular una nueva fecha de d??a laborable basado en una fecha determinada con un n??mero de d??as especificado, s??bado y festivos deducidos',
	'params' => array(
		array(
			'name' => 'date',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'numofdays',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de d??as',
		),
		array(
			'name' => 'removesaturday',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'if set to 0, Saturdays will not be added, if set to any other value, they will be added',
		),
		array(
			'name' => 'holidays',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'nombre de un mapa de informaci??n que contiene las fechas de vacaciones para excluir',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"sub_workdays('2020-10-01', '60', 0, 'holidays in  2020')",
		"sub_workdays('2020-10-01', '60', 0, 'holidays in  2020')",
	),
),
'add_months' => array(
	'name' => 'add_months(datefield, noofmonths)',
	'desc' => 'Calcular una nueva fecha basada en una fecha dada con un n??mero espec??fico de meses a??adidos',
	'params' => array(
		array(
			'name' => 'datefield',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'noofmonths',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de meses',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"add_months('2020-10-01', '10')",
		"add_months('2020-10-01', '5')",
	),
),
'sub_months' => array(
	'name' => 'sub_months(datefield, noofmonths)',
	'desc' => 'Calcular una nueva fecha basada en una fecha dada con un n??mero espec??fico de meses restados',
	'params' => array(
		array(
			'name' => 'datefield',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'noofmonths',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de meses',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"sub_months('2020-10-01', 5)",
	),
),
'add_time' => array(
	'name' => 'add_time(timefield, minutes)',
	'desc' => 'Calcular un nuevo tiempo basado en un tiempo dado, con los minutos especificados a??adidos',
	'params' => array(
		array(
			'name' => 'timefield',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier hora v??lida o nombre de campo de tipo de hora',
		),
		array(
			'name' => 'minutes',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de minutos',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"add_time(start_time, 180)",
		"add_time('12:00', 40)",
	),
),
'sub_time' => array(
	'name' => 'sub_time(timefield, minutes)',
	'desc' => 'Calcular un nuevo tiempo basado en un tiempo dado, con los minutos especificados restados',
	'params' => array(
		array(
			'name' => 'timefield',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier hora v??lida o nombre de campo de tipo de hora',
		),
		array(
			'name' => 'minutes',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de minutos',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"sub_time(start_time, 90)",
		"sub_time('12:00', 90)",
	),
),
'today' => array(
	'name' => "get_date('today')",
	'desc' => 'Esta funci??n devuelve la fecha actual como un valor de fecha',
	'params' => array(
		array(
			'name' => 'today',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'la cadena today',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"get_date('today')'",
	),
),
'today' => array(
	'name' => "get_date('now')",
	'desc' => 'Esta funci??n devuelve la fecha y hora actual como un valor de fecha',
	'params' => array(
		array(
			'name' => 'now',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'la cadena now',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"get_date('now')",
	),
),
'tomorrow' => array(
	'name' => "get_date('tomorrow')",
	'desc' => 'Esta funci??n devuelve la fecha de ma??ana como un valor de fecha',
	'params' => array(
		array(
			'name' => 'tomorrow',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena tomorrow',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"get_date('tomorrow')",
	),
),
'yesterday' => array(
	'name' => "get_date('yesterday')",
	'desc' => 'Esta funci??n devuelve la fecha de ayer como valor de fecha.',
	'params' => array(
		array(
			'name' => 'yesterday',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena yesterday',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"get_date('yesterday')",
	),
),
'time' => array(
	'name' => "get_date('time')",
	'desc' => 'Esta funci??n devuelve la hora actual.',
	'params' => array(
		array(
			'name' => 'time',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena time',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"get_date('time')"
	),
),
'format_date' => array(
	'name' => 'format_date(date,format)',
	'desc' => 'Esta funci??n aplica un formato espec??fico a una fecha.',
	'params' => array(
		array(
			'name' => 'date',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'la fecha que necesitas formatear',
		),
		array(
			'name' => 'format',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Especificaci??n de formato de fecha PHP',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"format_date('2020-06-20','d-m-Y')",
		"format_date(due_date,'d-m-Y H:i:s')",
	),
),
'next_date' => array(
	'name' => 'get_nextdate(startDate, days, holidays, include_weekend)',
	'desc' => 'Calcular una pr??xima fecha basada en una fecha determinada con d??as espec??ficos, s??bado y festivos excluidos',
	'params' => array(
		array(
			'name' => 'startDate',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'days',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de d??as',
		),
		array(
			'name' => 'holidays',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'nombre de un mapa de informaci??n que contiene las fechas de vacaciones para incluir',
		),
		array(
			'name' => 'include_weekend',
			'type' => 'Entero',
			'optional' => true,
			'desc' => 'si se establece en 0, el fin de semana no se agregar??, si se establece en cualquier otro valor, se incluir??n',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"get_nextdate('2020-10-01', '15,30', 'holidays in  2020', 0)",
		"get_nextdate('2020-10-01', '30', 'holidays in  2020' ,1)",
	),
),
'next_date_laborable' => array(
	'name' => 'get_nextdatelaborable(startDate,days,holidays,saturday_laborable)',
	'desc' => 'Calcular una pr??xima fecha laborable basada en una fecha determinada con d??as espec??ficos, s??bado y festivos excluidos',
	'params' => array(
		array(
			'name' => 'startDate',
			'type' => 'Fecha',
			'optional' => false,
			'desc' => 'cualquier fecha v??lida o nombre de campo de tipo de fecha',
		),
		array(
			'name' => 'days',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de d??as',
		),
		array(
			'name' => 'holidays',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'nombre de un mapa de informaci??n que contiene las fechas de vacaciones para incluir',
		),
		array(
			'name' => 'saturday_laborable',
			'type' => 'Entero',
			'optional' => true,
			'desc' => 'si se establece en 0, el fin de semana no se agregar??, si se establece en cualquier otro valor, se incluir??n',
		),
	),
	'categories' => array('Date and Time'),
	'examples' => array(
		"get_nextdate('2020-10-01', '15,30', 'holidays in  2020', 0)",
		"get_nextdate('2020-10-01', '30', 'holidays in  2020', 1)",
	),
),
'stringposition' => array(
	'name' => 'stringposition(haystack,needle)',
	'desc' => 'Esta funci??n le permite encontrar la posici??n de la primera aparici??n de una subcadena en una cadena.',
	'params' => array(
		array(
			'name' => 'haystack',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Especifica la cadena en la que se busca',
		),
		array(
			'name' => 'needle',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Especifica la cadena a buscar',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"stringposition('abc','a')",
	),
),
'stringlength' => array(
	'name' => 'stringlength(string)',
	'desc' => 'Esta funci??n devuelve la longitud de una cadena.',
	'params' => array(
		array(
			'name' => 'string',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Especifica la cadena a medir',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"stringlength('Strings')",
	),
),
'stringreplace' => array(
	'name' => 'stringreplace(search,replace,subject)',
	'desc' => 'Esta funci??n devuelve una cadena con todas las apariciones de b??squeda en el asunto reemplazadas con el valor de reemplazo dado.',
	'params' => array(
		array(
			'name' => 'search',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'el valor que se busca',
		),
		array(
			'name' => 'replace',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'el valor a sustituir',
		),
		array(
			'name' => 'subject',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena en la que se busca y sustituye',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"stringreplace('ERICA','JON','MIKE AND ERICA ') // cambia erica por jon",
	),
),
'regexreplace' => array(
	'name' => 'regexreplace(pattern,replace,subject)',
	'desc' => 'Esta funci??n devuelve una cadena con todas las apariciones de la expresi??n regular en el asunto reemplazadas con el valor de reemplazo dado.',
	'params' => array(
		array(
			'name' => 'pattern',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la expresi??n regular para buscar',
		),
		array(
			'name' => 'replace',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'el valor a sustituir',
		),
		array(
			'name' => 'subject',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena en la que se busca y sustituye',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"regexreplace('[A-za-z]+','J','MIKE AND ERICA ')  //todo Js"
	),
),
'randomstring' => array(
	'name' => 'randomstring(length)',
	'desc' => 'Esta funci??n devuelve una cadena aleatoria de la longitud indicada.',
	'params' => array(
		array(
			'name' => 'length',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'n??mero de caracteres aleatorios a devolver',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		'randomstring(12)  // 02E373931343',
	),
),
'power' => array(
	'name' => 'power(base, exponential)',
	'desc' => 'Esta funci??n se usa para calcular la potencia de cualquier n??mero, como calcular cuadrados y cubos en campos enteros.',
	'params' => array(
		array(
			'name' => 'base',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'la base al exponente',
		),
		array(
			'name' => 'exponential',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'el n??mero de exponente a la base',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		'power(2, 3)',
	),
),
'log' => array(
	'name' => 'log(n??mero, base)',
	'desc' => 'Esta funci??n se utiliza para calcular el logaritmo de cualquier n??mero con la base dada.',
	'params' => array(
		array(
			'name' => 'n??mero',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'el n??mero a calcular el logaritmo',
		),
		array(
			'name' => 'base',
			'type' => 'Entero',
			'optional' => true,
			'desc' => 'base del logaritmo, si no se da se utilizar?? el logaritmo natural',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		'log(10)',
		'log(10, 10)',
	),
),
'substring' => array(
	'name' => 'substring(stringfield,start,length)',
	'desc' => 'Esta funci??n devuelve la parte del campo de cadena especificada por los par??metros de inicio y longitud.',
	'params' => array(
		array(
			'name' => 'stringfield',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'La cadena de la que extraer la subcadena',
		),
		array(
			'name' => 'start',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'Especifica d??nde empezar en la cadena, 0 es el primer car??cter de la cadena. Un n??mero negativo cuenta hacia atr??s desde el final de la cadena.',
		),
		array(
			'name' => 'length',
			'type' => 'Entero',
			'optional' => true,
			'desc' => 'Especifica la longitud de la cadena devuelta. Si el par??metro de longitud es 0, NULL o FALSE, devuelve una cadena vac??a',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		'substring("Hello world",1,8)',
	),
),
'uppercase' => array(
	'name' => 'uppercase(stringfield)',
	'desc' => 'Esta funci??n convierte una cadena especificada a may??sculas.',
	'params' => array(
		array(
			'name' => 'string',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena a convertir a may??sculas',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"uppercase('hello world')",
	),
),
'lowercase' => array(
	'name' => 'lowercase(stringfield)',
	'desc' => 'Esta funci??n convierte una cadena especificada a min??sculas.',
	'params' => array(
		array(
			'name' => 'string',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena a convertir a min??sculas',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"lowercase('HELLO WORLD')",
	),
),
'uppercasefirst' => array(
	'name' => 'uppercasefirst(stringfield)',
	'desc' => 'Esta funci??n convierte el primer car??cter de una cadena a may??sculas.',
	'params' => array(
		array(
			'name' => 'stringfield',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena en la que convertir el primer car??cter a may??sculas',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"uppercasefirst('hello world')",
	),
),
'uppercasewords' => array(
	'name' => 'uppercasewords(stringfield)',
	'desc' => 'Esta funci??n convierte el primer car??cter de cada palabra en una cadena a may??sculas.',
	'params' => array(
		array(
			'name' => 'stringfield',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena en la que convertir cada primer car??cter a may??sculas',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"uppercasewords('hello world')",
	),
),
'num2str' => array(
	'name' => 'num2str(number|field, language)',
	'desc' => 'Esta funci??n convierte un n??mero en su representaci??n textual.',
	'params' => array(
		array(
			'name' => 'number|field',
			'type' => 'N??mero',
			'optional' => false,
			'desc' => 'n??mero v??lido o nombre de campo',
		),
		array(
			'name' => 'language',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'El idioma en el que quieres la representaci??n textual',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"num2str('2017.34','en')",
	),
),
'number_format' => array(
	'name' => 'number_format(number, decimals, decimal_separator, thousands_separator)',
	'desc' => 'Esta funci??n formatea un n??mero con miles agrupados.',
	'params' => array(
		array(
			'name' => 'number',
			'type' => 'N??mero',
			'optional' => false,
			'desc' => 'El n??mero a formatear. Si no se establecen otros par??metros, el n??mero se formatear?? sin decimales y con una coma (,) como separador de miles',
		),
		array(
			'name' => 'decimals',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'Especifica cu??ntos decimales. Si se establece solo este par??metro, el n??mero se formatear?? con un punto (.) Como punto decimal',
		),
		array(
			'name' => 'decimal_separator',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'Especifica el car??cter que se utilizar?? como punto decimal.',
		),
		array(
			'name' => 'thousands_separator',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'Especifica el car??cter que se utilizar?? como separador de miles',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		"number_format(1999.2345, 2, ',', '.')",
		"number_format(1999.2345, 2)",
	),
),
'translate' => array(
	'name' => 'translate(string|field)',
	'desc' => 'Esta funci??n traduce una cadena dada.',
	'params' => array(
		array(
			'name' => 'string|field',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'cualquier cadena o nombre de campo para traducir',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"translate('digit_count')",
		"translate('this is my string')"
	),
),
'round' => array(
	'name' => 'round(numericfield,decimals)',
	'desc' => 'Esta funci??n redondea un n??mero de punto flotante.',
	'params' => array(
		array(
			'name' => 'numericfield',
			'type' => 'N??mero',
			'optional' => false,
			'desc' => 'El valor a redondear',
		),
		array(
			'name' => 'decimals',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'el n??mero de d??gitos decimales a redondear',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		'round(7045.2)'
	),
),
'ceil' => array(
	'name' => 'ceil(numericfield)',
	'desc' => 'Esta funci??n redondea un n??mero HACIA ARRIBA al entero m??s cercano.',
	'params' => array(
		array(
			'name' => 'numericfield',
			'type' => 'N??mero',
			'optional' => false,
			'desc' => 'El valor para redondear',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		"ceil(0.60)",
		"ceil(0.40)",
	),
),
'floor' => array(
	'name' => 'floor(numericfield)',
	'desc' => 'Esta funci??n redondea un n??mero HACIA ABAJO al entero m??s cercano.',
	'params' => array(
		array(
			'name' => 'numericfield',
			'type' => 'N??mero',
			'optional' => false,
			'desc' => 'El valor para redondear',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		"floor(0.60)",
		"floor(-5.1)",
	),
),
'modulo' => array(
	'name' => 'modulo(numericfield,numericfield)',
	'desc' => 'Esta funci??n devuelve el resto de la divisi??n de los par??metros.',
	'params' => array(
		array(
			'name' => 'numericfield',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'valor o campo',
		),
		array(
			'name' => 'numericfield',
			'type' => 'Entero',
			'optional' => false,
			'desc' => 'valor o campo',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		"modulo(5, 3)",
	),
),
'hash' => array(
	'name' => 'hash(field, method)',
	'desc' => 'Esta funci??n genera un valor hash (resumen del mensaje).',
	'params' => array(
		array(
			'name' => 'field',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Mensaje al que aplicar el hash',
		),
		array(
			'name' => 'method',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'algoritmo hash a aplicar: "md5", "sha1", "crc32"',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"hash('admin', 'sha1')",
	),
),
'globalvariable' => array(
	'name' => 'globalvariable(gvname)',
	'desc' => 'Devuelve el valor de una variable global.',
	'params' => array(
		array(
			'name' => 'gvname',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'cualquier nombre de variable global',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"globalvariable('Application_ListView_PageSize')",
	),
),
'aggregation' => array(
	'name' => 'aggregation(operation, RelatedModule, relatedFieldToAggregate, conditions)',
	'desc' => 'Varias filas se agrupan para formar un solo valor de resumen de un campo.',
	'params' => array(
		array(
			'name' => 'operation',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'sum, min, max, avg, count, std, variance, group_concat, time_to_sec',
		),
		array(
			'name' => 'RelatedModule',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'm??dulo relacionado para la agregaci??n',
		),
		array(
			'name' => 'relatedFieldToAggregate',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo relacionado para agregar',
		),
		array(
			'name' => 'conditions',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'condici??n opcional usada para filtrar los registros: [field,op,value,glue],[...] Ten en cuenta que la evaluaci??n del valor se realiza con un proceso simple que no admite funciones, si necesitas usar el lenguaje de expresi??n de flujos de trabajo, tienes que a??adir un par??metro con la palabra "expression" para forzar la evaluaci??n del valor como una expresi??n.',
		),
	),
	'categories' => array('Statistics'),
	'examples' => array(
		"aggregation('min','CobroPago','amount')",
		"aggregation('count','SalesOrder','*','[duedate,h,2018-01-01]')",
		"aggregation('count','SalesOrder','*','[duedate,h,get_date('today'),or,expression]')"
	),
),
'aggregation_fields_operation' => array(
	'name' => 'aggregation_fields_operation(operation, RelatedModule, relatedFieldsToAggregateWithOperation, conditions)',
	'desc' => 'Varias filas se agrupan para formar un solo valor de resumen en una operaci??n de campos.',
	'params' => array(
		array(
			'name' => 'operation',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'sum, min, max, avg, count, std, variance, group_concat, time_to_sec',
		),
		array(
			'name' => 'RelatedModule',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'm??dulo relacionado para la agregaci??n',
		),
		array(
			'name' => 'relatedFieldsToAggregateWithOperation',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Expresi??n SQL para ejecutar y agregar',
		),
		array(
			'name' => 'conditions',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'condici??n opcional usada para filtrar los registros: [field,op,value,glue],[...]',
		),
	),
	'categories' => array('Statistics'),
	'examples' => array(
		"aggregation_fields_operation('sum','InventoryDetails','quantity*listprice')",
	),
),
'getCurrentUserID' => array(
	'name' => 'getCurrentUserID()',
	'desc' => 'Esta funci??n devuelve el ID de usuario actual.',
	'params' => array(
	),
	'categories' => array('Information'),
	'examples' => array(
		"getCurrentUserID()",
	),
),
'getCurrentUserName' => array(
	'name' => 'getCurrentUserName({full})',
	'desc' => 'Esta funci??n devuelve el nombre de usuario actual.',
	'params' => array(
		array(
			'name' => 'full',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'la cadena full, si se proporciona, se devolver?? el nombre completo (nombre y apellido) en lugar del nombre de usuario de la aplicaci??n',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getCurrentUserName('full')"
	),
),
'getCurrentUserField' => array(
	'name' => 'getCurrentUserField(fieldname)',
	'desc' => 'Esta funci??n devuelve un valor de campo del usuario actual',
	'params' => array(
		array(
			'name' => 'fieldname',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'cualquier nombre de campo de usuario',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getCurrentUserField('email1')",
	),
),
'getCRMIDFromWSID' => array(
	'name' => 'getCRMIDFromWSID(id)',
	'desc' => 'Esta funci??n devuelve el id de un registro',
	'params' => array(
		array(
			'name' => 'id',
			'type' => 'Cadena(WSID)',
			'optional' => false,
			'desc' => 'ID de un registro en formato de servicio web',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getCRMIDFromWSID('33x2222')",
	),
),
'average' => array(
	'name' => 'average(number,...)',
	'desc' => 'Esta funcion devuelve la media de una lista de n??meros',
	'params' => array(
		array(
			'name' => 'number',
			'type' => 'N??mero',
			'optional' => false,
			'desc' => 'Lista de n??meros',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		"average(1,2,3)",
),
),
'getEntityType' => array(
	'name' => 'getEntityType(field)',
	'desc' => 'Esta funci??n devuelve el nombre del m??dulo de la ID dada.',
	'params' => array(
		array(
			'name' => 'field',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'cualquier campo de relaci??n',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getEntityType(related_to)",
		"getEntityType(id)"
	),
),
'getimageurl' => array(
	'name' => 'getimageurl(field)',
	'desc' => 'Esta funci??n devuelve la URL de la imagen contenida en un campo de imagen.',
	'params' => array(
		array(
			'name' => 'field',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'cualquier campo de imagen',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getimageurl(placeone)",
	),
),
'getLatitude' => array(
	'name' => 'getLatitude(address)',
	'desc' => 'Esta funci??n devuelve la latitud de una direcci??n dada.',
	'params' => array(
		array(
			'name' => 'address',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Direcci??n para encontrar la latitud',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getLatitude(address)",
	),
),
'getLongitude' => array(
	'name' => 'getLongitude(address)',
	'desc' => 'Esta funci??n devuelve la longitud de una direcci??n dada.',
	'params' => array(
		array(
			'name' => 'address',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Direcci??n para encontrar la longitud',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getLongitude(address)",
	),
),
'getGEODistance' => array(
	'name' => 'getGEODistance(address_from, address_to)',
	'desc' => 'Esta funci??n devuelve la distancia de una direcci??n a otra.',
	'params' => array(
		array(
			'name' => 'address_from',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Direcci??n de',
		),
		array(
			'name' => 'address_to',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Direcci??n a',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistance(address_from, address_to)"
	),
),
'getGEODistanceFromCompanyAddress' => array(
	'name' => 'getGEODistanceFromCompanyAddress(address)',
	'desc' => 'Esta funci??n devuelve la distancia desde la direcci??n dada a la direcci??n establecida de la empresa.',
	'params' => array(
		array(
			'name' => 'address',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromCompanyAddress(address)"
	),
),
'getGEODistanceFromUserAddress' => array(
	'name' => 'getGEODistanceFromUserAddress(address)',
	'desc' => 'Esta funci??n devuelve la distancia desde la direcci??n dada a la direcci??n de usuario establecida.',
	'params' => array(
		array(
			'name' => 'address',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromUserAddress('address')",
	),
),
'getGEODistanceFromUser2AccountBilling' => array(
	'name' => 'getGEODistanceFromUser2AccountBilling(account, address_specification)',
	'desc' => 'Esta funci??n calcula la distancia desde la direcci??n del usuario hasta la direcci??n de facturaci??n de la cuenta.',
	'params' => array(
		array(
			'name' => 'account',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Cuenta',
		),
		array(
			'name' => 'address_specification',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n de facturaci??n',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromUser2AccountBilling(account, 'address')"
	),
),
'getGEODistanceFromAssignUser2AccountBilling' => array(
	'name' => 'getGEODistanceFromAssignUser2AccountBilling(account, assigned_user, address_specification)',
	'desc' => 'Esta funci??n calcula la distancia desde el usuario asignado a la direcci??n de facturaci??n de la cuenta.',
	'params' => array(
		array(
			'name' => 'account',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Cuenta',
		),
		array(
			'name' => 'assigned_user',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Usuario',
		),
		array(
			'name' => 'address_specification',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n de facturaci??n',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromAssignUser2AccountBilling(account, assigned_user, 'address')"
	),
),
'getGEODistanceFromUser2AccountShipping' => array(
	'name' => 'getGEODistanceFromUser2AccountShipping(account, address_specification)',
	'desc' => 'Esta funci??n calcula la distancia desde el usuario actual hasta la direcci??n de env??o de la cuenta.',
	'params' => array(
		array(
			'name' => 'account',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Cuenta',
		),
		array(
			'name' => 'address_specification',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n de env??o',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromUser2AccountShipping(account, 'address')"
	),
),
'getGEODistanceFromAssignUser2AccountShipping' => array(
	'name' => 'getGEODistanceFromAssignUser2AccountShipping(account, assigned_user, address_specification)',
	'desc' => 'Esta funci??n calcula la distancia desde Asignar usuario a la direcci??n de env??o de la cuenta.',
	'params' => array(
		array(
			'name' => 'account',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Cuenta',
		),
		array(
			'name' => 'assigned_user',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Usuario',
		),
		array(
			'name' => 'address_specification',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n de env??o',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromAssignUser2AccountShipping(account, assigned_user, 'address')"
	),
),
'getGEODistanceFromUser2ContactBilling' => array(
	'name' => 'getGEODistanceFromUser2ContactBilling(contact, address_specification)',
	'desc' => 'Esta funci??n calcula la distancia desde el usuario hasta la direcci??n de facturaci??n del contacto.',
	'params' => array(
		array(
			'name' => 'contact',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Contacto',
		),
		array(
			'name' => 'address_specification',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n de facturaci??n',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromUser2ContactBilling(contact, 'address')",
	),
),
'getGEODistanceFromAssignUser2ContactBilling' => array(
	'name' => 'getGEODistanceFromAssignUser2ContactBilling(contact, assigned_user, address_specification)',
	'desc' => 'Esta funci??n calcula la distancia desde el usuario asignado hasta la direcci??n de facturaci??n del contacto.',
	'params' => array(
		array(
			'name' => 'contact',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Contacto',
		),
		array(
			'name' => 'assigned_user',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Usuario',
		),
		array(
			'name' => 'address_specification',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n de facturaci??n',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromAssignUser2ContactBilling(contact, assigned_user, 'address')",
	),
),
'getGEODistanceFromUser2ContactShipping' => array(
	'name' => 'getGEODistanceFromUser2ContactShipping(contact, address_specification)',
	'desc' => 'Esta funci??n calcula la distancia desde un usuario a una direcci??n de env??o de contacto.',
	'params' => array(
		array(
			'name' => 'contact',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Contacto',
		),
		array(
			'name' => 'address_specification',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n de env??o',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromUser2ContactShipping(contact, 'address')",
	),
),
'getGEODistanceFromAssignUser2ContactShipping' => array(
	'name' => 'getGEODistanceFromAssignUser2ContactShipping(contact, assigned_user, address_specification)',
	'desc' => 'Esta funci??n calcula la distancia desde el usuario asignado a la direcci??n de env??o del contacto.',
	'params' => array(
		array(
			'name' => 'contact',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Contacto',
		),
		array(
			'name' => 'assigned_user',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID Usuario',
		),
		array(
			'name' => 'address_specification',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campos que contienen la direcci??n de env??o',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getGEODistanceFromAssignUser2ContactShipping(contact, assigned_user, 'address')",
	),
),
'getGEODistanceFromCoordinates' => array(
	'name' => 'getGEODistanceFromCoordinates(lat1, long1, lat2, long2)',
	'desc' => 'Esta funci??n calcula la distancia entre dos coordenadas.',
	'params' => array(
		array(
			'name' => 'lat1',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'latitud desde',
		),
		array(
			'name' => 'long1',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'longitud desde',
		),
		array(
			'name' => 'lat2',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'latitud a',
		),
		array(
			'name' => 'long2',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'longitud a',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		'getGEODistanceFromCoordinates(lat1, long1, lat2, long2)',
	),
),
'getIDof' => array(
	'name' => 'getIDof(module, searchon, searchfor)',
	'desc' => 'Esta funci??n busca en el m??dulo dado un registro con el valor `searchfor` en el campo `searchon` y devuelve el ID de ese registro si se encuentra o 0 si no. El objetivo de esta funci??n es establecer valores de campos relacionados en tareas de creaci??n/actualizaci??n.',
	'params' => array(
		array(
			'name' => 'module',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'el nombre del m??dulo en el que buscar.',
		),
		array(
			'name' => 'searchon',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo del m??dulo en el que buscar',
		),
		array(
			'name' => 'searchfor',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'valor para buscar',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getIDof('Contacts', 'firstname', 'Amy')",
		"getIDof('Accounts', 'siccode', 'xyhdmsi33')",
		"getIDof('Accounts', 'siccode', algun_campo)",
	),
),
'getRelatedIDs' => array(
	'name' => 'getRelatedIDs(module, recordid)',
	'desc' => 'Esta funci??n devuelve un array de IDs de registros del m??dulo dado que est??n relacionados con el registro que activa el flujo de trabajo',
	'params' => array(
		array(
			'name' => 'module',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'el nombre del m??dulo relacionado en el que buscar.',
		),
		array(
			'name' => 'recordid',
			'type' => 'Entero',
			'optional' => true,
			'desc' => 'el ID de registro principal para obtener los registros relacionados, si no se proporciona se utilizar?? el registro actual del flujo de trabajo',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getRelatedIDs('Contacts')",
		"getRelatedIDs('Accounts')",
		"getRelatedIDs('Contacts', 943)",
	),
),
'getRelatedMassCreateArray' => array(
	'name' => 'getRelatedMassCreateArray(module, recordid)',
	'desc' => 'Obtener una estructura JSON de creaci??n masiva de servicio web para el ID de registro dado y sus registros de m??dulo relacionados',
	'params' => array(
		array(
			'name' => 'module',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'el nombre del m??dulo relacionado para obtener registros de',
		),
		array(
			'name' => 'recordid',
			'type' => 'Entero',
			'optional' => true,
			'desc' => 'el ID del registro principal para obtener los registros relacionados, si no se proporciona el registro actual que desencadena el flujo de trabajo, se utilizar??',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getRelatedMassCreateArray('Contacts', 943)",
	),
),
'getRelatedMassCreateArrayConverting' => array(
	'name' => 'getRelatedMassCreateArrayConverting(module, MainModuleDestination, RelatedModuleDestination, recordid)',
	'desc' => 'Obtener una estructura JSON de creaci??n masiva de servicio web para el ID de registro dado y sus registros de m??dulo relacionados aplicando mapas de conversi??n',
	'params' => array(
		array(
			'name' => 'module',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'el nombre del m??dulo relacionado para obtener registros de',
		),
		array(
			'name' => 'MainModuleDestination',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'm??dulo destino registros del m??dulo principal',
		),
		array(
			'name' => 'RelatedModuleDestination',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'm??dulo destino para m??dulos relacionados',
		),
		array(
			'name' => 'recordid',
			'type' => 'Entero',
			'optional' => true,
			'desc' => 'el ID del registro principal para obtener los registros relacionados, si no se proporciona el registro actual que desencadena el flujo de trabajo, se utilizar??',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getRelatedMassCreateArrayConverting('Contacts','Products','PurchaseOrder',943)",
	),
),
'getRelatedRecordCreateArrayConverting' => array(
	'name' => 'getRelatedRecordCreateArrayConverting(module, RelatedModuleDestination, recordid)',
	'desc' => 'Obtener una estructura JSON de Maestro-Detalle de servicio web para el ID de registro dado y sus registros de m??dulo relacionados aplicando mapas de conversi??n',
	'params' => array(
		array(
			'name' => 'module',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'el nombre del m??dulo relacionado para obtener registros de',
		),
		array(
			'name' => 'RelatedModuleDestination',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'm??dulo destino para m??dulos relacionados',
		),
		array(
			'name' => 'recordid',
			'type' => 'Entero',
			'optional' => true,
			'desc' => 'el ID del registro principal para obtener los registros relacionados, si no se proporciona el registro actual que desencadena el flujo de trabajo, se utilizar??',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getRelatedRecordCreateArrayConverting('Contacts','PurchaseOrder',943)",
	),
),
'getISODate' => array(
	'name' => 'getISODate(a??o, semana, diadesemana)',
	'desc' => 'Obtiene Fecha en formato ISO a partir de un a??o, semana y d??a determinados en una semana',
	'params' => array(
		array(
			'name' => 'year',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'A??o',
		),
		array(
			'name' => 'weeks',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'n??mero de semana',
		),
		array(
			'name' => 'dayInWeek',
			'type' => 'Cadena',
			'optional' => false,
			'desc' => 'n??mero del d??a de la semana (1-7)',
		)
	),
	'categories' => array('Application'),
	'examples' => array(
		"getISODate('2022','10','4',)",
	),
),
'getFieldsOF' => array(
	'name' => 'getFieldsOF(id, m??dulo, campos)',
	'desc' => 'Dado el ID de un registro existente, esta funci??n devolver?? una matriz con todos los valores de los campos a los que tiene acceso el usuario. Si especificas los campos que quieres en la funci??n, solo se devolver??n esos valores.',
	'params' => array(
		array(
			'name' => 'id',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'el ID en el que buscar',
		),
		array(
			'name' => 'm??dulo',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'el m??dulo en el que buscar',
		),
		array(
			'name' => 'campos',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'campos a devolver',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getFieldsOF('8509', 'Contacts')",
		"getFieldsOF('8509', 'Contacts', 'field1,field2,...,fieldN')",
	),
),
'getFromContext' => array(
	'name' => 'getFromContext(variablename)',
	'desc' => 'Esta funci??n obtiene el valor de la variable de contexto variablename.',
	'params' => array(
		array(
			'name' => 'variablename',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'el nombre de la variable para leer del contexto. acepta sintaxis de puntos en el nombre de la variable y se puede especificar m??s de una variable separ??ndolas con comas. Si se proporciona m??s de una variable, se devolver?? una matriz codificada en JSON con los valores',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getFromContext('ID')",
		"getFromContext('ID,firstname,lastname')",
		"getFromContext('response.property.index.field')",
		"getFromContext('response.data.2.label')",
	),
),
'getFromContextSearching' => array(
	'name' => 'getFromContextSearching(variablename, searchon, searchfor, returnthis)',
	'desc' => 'Esta funci??n obtiene el valor de returnthis del contexto pero busca la entrada correcta en una matriz indicada por nombre de la variable. Esta funci??n recorrer?? la variable en el contexto y llegar?? a una matriz, luego buscar?? en la matriz un elemento que tenga la propiedad searchon establecida al valor de searchfor, una vez encontrado, devolver?? la propiedad indicada por `returnnthis`. Se supone que la matriz contiene objetos o matrices indexadas para buscar.',
	'params' => array(
		array(
			'name' => 'variablename',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la ruta a una matriz en contexto. acepta sintaxis de puntos en el nombre de la variable y se puede especificar m??s de una variable separ??ndolas con comas. Si se proporciona m??s de una variable, se devolver?? una matriz codificada en JSON con los valores',
		),
		array(
			'name' => 'searchon',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'propiedad del elemento de matriz para buscar',
		),
		array(
			'name' => 'searchfor',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'valor para buscar',
		),
		array(
			'name' => 'returnthis',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'propiedad del elemento de matriz para devolver',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getFromContextSearching('response.data.2.custom_fields', 'label', 'Servizio_di_portineria', 'fleet_data')",
	),
),
'setToContext' => array(
	'name' => 'setToContext(variablename, value)',
	'desc' => 'Esta funci??n establece un valor en una variable de contexto.',
	'params' => array(
		array(
			'name' => 'variablename',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'variable para establecer en el contexto',
		),
		array(
			'name' => 'value',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'valor para establecer',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"setToContext('accountname','mortein')",
	),
),
'jsonEncode' => array(
	'name' => 'jsonEncode(field)',
	'desc' => 'Esta funci??n JSON codifica la variable dada.',
	'params' => array(
		array(
			'name' => 'field',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo para codificar en JSON',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"jsonEncode('accountname')",
	),
),
'jsonDecode' => array(
	'name' => 'jsonDecode(field)',
	'desc' => 'Esta funci??n devuelve la decodificaci??n JSON de una variable.',
	'params' => array(
		array(
			'name' => 'field',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'variable para decodificar desde JSON',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"jsonDecode(field)",
	),
),
'implode' => array(
	'name' => 'implode(delimiter, field)',
	'desc' => 'Esta funci??n devuelve una cadena de concatenaci??n de los elementos de una matriz.',
	'params' => array(
		array(
			'name' => 'delimiter',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'Especifica qu?? caracter poner entre los elementos de la matriz. El valor predeterminado es una cadena vac??a',
		),
		array(
			'name' => 'field',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo de tipo matriz o variable para unir',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"implode(' ', somearrayfield)",
		"implode(' ', getFromContext('array_response'))",
	),
),
'explode' => array(
	'name' => 'explode(delimiter, field)',
	'desc' => 'Esta funci??n devuelve una matriz de cadenas, cada una de las cuales es una subcadena de campo formada al dividirla en los l??mites formados por el delimitador de cadena.',
	'params' => array(
		array(
			'name' => 'delimiter',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'especifica d??nde separar la cadena',
		),
		array(
			'name' => 'field',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'la cadena a separar',
		),
	),
	'categories' => array('Text'),
	'examples' => array(
		"explode(',', 'hello,there')",
		"setToContext('array_response', explode(',', 'hello,there'))",
	),
),
'sendMessage' => array(
	'name' => 'sendMessage(message, channel, time)',
	'desc' => 'TEsta funci??n env??a un mensaje al canal de cola de mensajes coreBOS.',
	'params' => array(
		array(
			'name' => 'message',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'El cuerpo del mensaje',
		),
		array(
			'name' => 'channel',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'canal al que enviar el mensaje',
		),
		array(
			'name' => 'time',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'tiempo de expiraci??n del mensaje',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"sendMessage('message', 'somechannel', 90)",
	),
),
'readMessage' => array(
	'name' => 'readMessage(channel)',
	'desc' => 'Esta funci??n lee un mensaje de un canal de cola de mensajes coreBOS.',
	'params' => array(
		array(
			'name' => 'channel',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'canal del cual leer el mensaje',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"readMessage('somechannel')",
	),
),
'getSetting' => array(
	'name' => "getSetting('setting_key', 'default')",
	'desc' => 'Esta funci??n lee una variable del almac??n de clave-valor de coreBOS, con un valor predeterminado si no se encuentra.',
	'params' => array(
		array(
			'name' => 'setting_key',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'calve',
		),
		array(
			'name' => 'default',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'valor a devolver si la clave no se encuentra',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"getSetting('KEY_ACCESSTOKEN', 'some default value')",
	),
),
'setSetting' => array(
	'name' => "setSetting('setting_key', value)",
	'desc' => 'Esta funci??n permite establecer un valor en el almac??n de clave-valor de coreBOS.',
	'params' => array(
		array(
			'name' => 'setting_key',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'clave',
		),
		array(
			'name' => 'value',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'valor para establecer en la clave',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"setSetting('hubspot_pollsyncing', 'creating')",
	),
),
'delSetting' => array(
	'name' => 'delSetting("setting_key")',
	'desc' => 'Esta funci??n elimina una clave del almac??n de clave-valor de coreBOS.',
	'params' => array(
		array(
			'name' => 'setting_key',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'clave a eliminar',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"setting_key('hubspot_pollsyncing')",
	),
),
'evaluateRule' => array(
	'name' => 'evaluateRule(ruleID)',
	'desc' => 'Esta funci??n eval??a una regla coreBOS.',
	'params' => array(
		array(
			'name' => 'ruleID',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'ID de la regla a ejecutar',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"evaluateRule(ruleID)",
	),
),
'executeSQL' => array(
	'name' => 'executeSQL(query, parameters...)',
	'desc' => 'Ejecuta una consulta SQL.',
	'params' => array(
		array(
			'name' => 'query',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'una consulta SQL preparada',
		),
		array(
			'name' => 'parameters',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'cualquier n??mero de par??metros que necesite la consulta SQL',
		),
	),
	'categories' => array('Application'),
	'examples' => array(
		"executeSQL('select siccode from vtiger_accounts where accountname=?', campo)",
	),
),
'getCRUDMode' => array(
	'name' => 'getCRUDMode()',
	'desc' => 'Esta funci??n devuelve create o edit dependiendo de la acci??n que se est?? realizando.',
	'params' => array(
	),
	'categories' => array('Application'),
	'examples' => array(
		"getCRUDMode()",
	),
),
'Importing' => array(
	'name' => 'Importing()',
	'desc' => 'Esta funci??n devuelve verdadero si la ejecuci??n est?? dentro de un proceso de importaci??n o falso en caso contrario.',
	'params' => array(
	),
	'categories' => array('Application'),
	'examples' => array(
		"Importing()",
	),
),
'isNumeric' => array(
	'name' => 'isNumeric(fieldname)',
	'desc' => 'Esta funci??n comprueba si un campo es num??rico.',
	'params' => array(
		array(
			'name' => 'fieldname',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo para evaluar',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"isNumeric(accountname)",
	),
),
'isString' => array(
	'name' => 'isString(fieldname)',
	'desc' => 'Esta funci??n comprueba si el campo es una cadena.',
	'params' => array(
		array(
			'name' => 'fieldname',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo para comprobar si es una cadena',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"isString(account_id)",
	),
),
'OR' => array(
	'name' => 'OR(condition1, condition2, {conditions})',
	'desc' => 'Esta funci??n devuelve verdadero si alguna de las condiciones proporcionadas es l??gicamente verdadera, y falso si todas las condiciones proporcionadas son l??gicamente falsas.',
	'params' => array(
		array(
			'name' => 'condition1',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'primera condici??n',
		),
		array(
			'name' => 'condition2',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'segunda condici??n',
		),
		array(
			'name' => 'conditions',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'conjunto de condiciones',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"OR(isString($(account_id : (Accounts) accountname)), isNumeric($(account_id : (Accounts) bill_code)))"
	),
),
'AND' => array(
	'name' => 'AND(condition1, condition2, {conditions})',
	'desc' => 'Esta funci??n devuelve verdadero si todas las condiciones proporcionadas son l??gicamente verdaderas, y falso si alguna de las condiciones proporcionadas es l??gicamente falsa.',
	'params' => array(
		array(
			'name' => 'condition1',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'primera condici??n',
		),
		array(
			'name' => 'condition2',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'segunda condici??n',
		),
		array(
			'name' => 'conditions',
			'type' => 'Texto',
			'optional' => true,
			'desc' => 'conjunto de condiciones',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"AND(isString($(account_id : (Accounts) accountname)), isNumeric($(account_id : (Accounts) accounttype)))"
	),
),
'NOT' => array(
	'name' => 'NOT(condition)',
	'desc' => 'Esta funci??n devuelve el opuesto de un valor l??gico - `NOT(TRUE)` devuelve `FALSE`; `NOT(FALSE)` devuelve `TRUE`.',
	'params' => array(
		array(
			'name' => 'condition',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'condici??n',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"NOT(isString($(account_id : (Accounts) accountname)))",
	),
),
'regex' => array(
	'name' => 'regex(pattern, subject)',
	'desc' => 'Esta funci??n devuelve el resultado de un patr??n de expresiones regulares en la cadena dada.',
	'params' => array(
		array(
			'name' => 'pattern',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'patr??n de expresiones regulares',
		),
		array(
			'name' => 'subject',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'texto sobre el que aplicar el patr??n',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"regex('[a-z]+', msg )",
	),
),
'exists' => array(
	'name' => 'exists(fieldname, value)',
	'desc' => 'Esta funci??n verifica si existe o no un registro con el valor dado en el campo dado.',
	'params' => array(
		array(
			'name' => 'fieldname',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo para comprobar su existencia',
		),
		array(
			'name' => 'value',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'valor que debe tener el campo',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"exists('accountname', 'Chemex Labs Ltd')",
	),
),
'existsrelated' => array(
	'name' => 'existsrelated(relatedmodule, fieldname, value)',
	'desc' => 'Esta funci??n verifica si existe o no un registro de m??dulo relacionado con el valor dado en el campo dado.',
	'params' => array(
		array(
			'name' => 'relatedmodule',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'm??dulo relacionado',
		),
		array(
			'name' => 'fieldname',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo para filtrar registros',
		),
		array(
			'name' => 'value',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'valor del campo',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"existsrelated('Contacts', 'accountname', 'Chemex Labs Ltd')",
	),
),
'allrelatedare' => array(
	'name' => 'allrelatedare(relatedmodule, fieldname, value)',
	'desc' => 'Esta funci??n verifica si todos los registros en el m??dulo relacionado tienen el valor dado en el campo dado.',
	'params' => array(
		array(
			'name' => 'relatedmodule',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'm??dulo relacionado',
		),
		array(
			'name' => 'fieldname',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo para filtrar registros',
		),
		array(
			'name' => 'value',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'valor del campo',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"allrelatedare('Contacts', 'accountname', 'Chemex Labs Ltd')",
	),
),
'allrelatedarethesame' => array(
	'name' => 'allrelatedarethesame(relatedmodule, fieldname, value)',
	'desc' => 'Esta funci??n verifica si todos los registros en el m??dulo relacionado tienen un ??nico valor. Si adem??s se proporciona un valor, todos los registros tendr??n que tener ese valor.',
	'params' => array(
		array(
			'name' => 'relatedmodule',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'm??dulo relacionado',
		),
		array(
			'name' => 'fieldname',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'campo para filtrar registros',
		),
		array(
			'name' => 'value',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'valor del campo',
		),
	),
	'categories' => array('Logical'),
	'examples' => array(
		"allrelatedarethesame('Contacts', 'accountname', 'Chemex Labs Ltd')",
	),
),
'min' => array(
	'name' => 'min(value1, value2, values)',
	'desc' => 'Esta funci??n devuelve el valor m??nimo de los valores dados.',
	'params' => array(
		array(
			'name' => 'values',
			'type' => 'M??ltiple',
			'optional' => false,
			'desc' => 'campos y valores para comprobar',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		'min(sum_nettotal, sum_total)',
	),
),
'max' => array(
	'name' => 'max(value1, value2, values)',
	'desc' => 'Esta funci??n devuelve el valor m??ximo de los valores dados.',
	'params' => array(
		array(
			'name' => 'values',
			'type' => 'M??ltiple',
			'optional' => false,
			'desc' => 'campos y valores para comprobar',
		),
	),
	'categories' => array('Math'),
	'examples' => array(
		'max(employees, breakpoint)',
	),
),
'getCurrentConfiguredTaxValues' => array(
	'name' => 'getCurrentConfiguredTaxValues(impuesto)',
	'desc' => 'Devuelve el valor num??rico del impuesto dado.',
	'params' => array(
		array(
			'name' => 'impuesto',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'nombre del impuesto',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getCurrentConfiguredTaxValues('impuesto')"
	),
),
'getCurrencyConversionValue' => array(
	'name' => 'getCurrencyConversionValue(moneda)',
	'desc' => 'Devuelve el valor num??rico de la moneda dada.',
	'params' => array(
		array(
			'name' => 'moneda',
			'type' => 'Texto',
			'optional' => false,
			'desc' => 'nombre de la moneda',
		),
	),
	'categories' => array('Information'),
	'examples' => array(
		"getCurrencyConversionValue('moneda')"
	),
),
);

foreach (glob('modules/com_vtiger_workflow/language/es_es.fndefs.*.php', GLOB_BRACE) as $tcode) {
	include $tcode;
}
