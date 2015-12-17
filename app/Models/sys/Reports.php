<?php

namespace System;

class Reports
{

	protected static $instance = NULL;
	protected $reports =[];

	protected $maps = [
	];

	public function __construct($id)
	{
		$this->addReport( call_user_func([$this->maps[$id], 'create']));
	}

	protected function addReport( ReportsRecord $report)
	{
		$this->reports[$report->id] = $report;
		return $this;
	}

	public static function make($id)
	{
		return self::$instance = new Reports($id);
	}

	public function toIndexConfig($id)
	{
		$record = $this->reports[$id];
		$result = [
			'id' 		     => $record->id,
			'view'		     => $record->view,
			'caption'        => $record->caption,
			'icon'           => $record->icon,

			'toolbar'        => $record->toolbar,
			'form'           => $record->form,

			'custom_styles'  => $record->css,
			'custom_scripts' => $record->js,
			
		];
		return $result;
	}

	public function toReportPdfConfig($id)
	{
		$record = $this->reports[$id];
		$result = [
			'logo'        => $record->logo,
			'titles'      => $record->titles,
			
			'file-name'   => $record->file_name,
			'gal_name'    => $record->gal_name,
			'columns'     => $record->columns,
			'dimensions'  => $record->dimensions,
			'data_source' => $record->data_source,

		];
		return $result;
	}

}