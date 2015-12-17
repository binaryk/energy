<?php

namespace System;

class ReportsRecord
{
	
	protected static $instance = NULL;

	public $id             				= NULL;
	public $view           				= '~layouts.report.index';
	public $caption		   				= 'Caption';
	public $titles                      = [];
	public $icon           				= 'admin/img/icons/rpt/report.png';
	public $logo                        = 'img/logo_final.jpg';
	public $form           				= '';
	public $toolbar        				= '';
	public $gal_name                    = NULL;

	public $file_name                   = '~reports/report.pdf';
	public $columns                     = [];
	public $dimensions                  = [];
	public $data_source                 = '';
	
	public $css            				= 'packages/daterangepicker/css/daterangepicker-bs3.css, admin/css/reports/rapoarte.css';
	public $js             				= 'packages/daterangepicker/js/daterangepicker.js, admin/js/libraries/reports/reports.js';

	public function __construct($id)
	{
		$this->id = $id;
	}

	public static function make($id)
	{
		return self::$instance = new ReportsRecord($id);
	}

}