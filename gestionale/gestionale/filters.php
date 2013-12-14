<?php

	add_filter('gestionale_dashboard_afterwidget', 'gestionale_dashboard_afterwidget_f',10,3);
	
	function gestionale_dashboard_afterwidget_f($val)
	{
		return $val;
	}
	
	add_filter('gestionale_dashboard_beforewidget', 'gestionale_dashboard_beforewidget_f',10,3);
	
	function gestionale_dashboard_beforewidget_f($val)
	{
		$val = str_replace('gradient', 'plain', $val);
		return $val;
	}