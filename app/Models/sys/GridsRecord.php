<?php

namespace System;

class GridsRecord
{
	
	protected static $instance = NULL;

	public $id             				= NULL;
	public $view           				= '~layouts.datatable.index';
	public $caption		   				= 'Caption';
	public $icon           				= 'admin/img/icons/dt/settings.png';
	public $toolbar        				= '';
	public $name           				= 'dt';
	public $display_start  				=  0;
	public $display_length 				= 10;
	public $default_order  				= "1,'asc'";
	public $row_source     				= 'datatable-row-source';
	public $dom            				= '<"dt-container"<"row row-dt-processing"<"col-xs-12 dt-processing"r>><"row row-dt-info"<"col-xs-12 dt-info"i>><"row row-dt-toolbar"<"col-xs-6 dt-tb-left"lf<"dt-toolbar">><"col-xs-6 dt-tb-right"p>><"row row-dt"<"col-xs-12 dt-table"t>>>';
	public $form           				= '';
	public $css            				= '';
	public $js             				= '';
	public $columns        				= [];
	public $fields                      = [];
	public $rows_source_sql 			= '';
	public $count_filtered_records_sql 	= '';
	public $count_total_records_sql     = '';
	public $filters                     = [];
	public $breadcrumbs 			 	= [];
	public $right_menu 			 		= [ ['caption' => 'Adaugă', 'class' => 'action-insert-record'] ];

	public function __construct($id)
	{
		$this->id = $id;
	}

	public static function make($id)
	{
		return self::$instance = new GridsRecord($id);
	}

	public function column( $column )
	{
		return 
			\Datatable\Column::make($column['id'])
			->orderable($column['orderable'] == 'yes')
			->header( 
				\Datatable\Header::make()
				->caption($column['header']['caption'])
				->style($column['header']['style'])
			)
			->class($column['class'])
			->visible($column['visible'] == 'yes')
		;
	}

	public function columns()
	{
		$result = [];
		foreach($this->columns as $i => $column)
		{
			$result[] = $this->column($column); 
		}
		return $result;
		
	}

	protected function cell($cell)
	{
		return 
			\Datatable\Cell::make($cell['id'])
			->type($cell['type'])
			->source($cell['source'])
			->visible($cell['visible'] == 'yes');
	}

	protected function cells()
	{
		$result = [];
		foreach( $this->columns  as $i => $cell )
		{
			$result[] = $this->cell($cell);
		}
		return $result;
	}

	public function source()
	{
		
		$result =
			\Datatable\Source::make()->type(\Datatable\Source::SOURCE_SQL)
			->length(\Input::get('length') ? \Input::get('length') : $this->display_length)
			->start(\Input::get('start') ? \Input::get('start') : $this->display_start)
			->search(\Input::get('search') ? \Input::get('search') : '')
			->order(\Input::get('order') ? \Input::get('order') : '')				
			->rowssql($this->rows_source_sql)
			->countsql($this->count_filtered_records_sql)
			->totalsql($this->count_total_records_sql)				
			->fields(explode(',', $this->fields['fields']) )
			->searchables(explode(',', $this->fields['searchables']) )
			->orderables( $this->fields['orderables'] )
			->cells($this->cells())
			->custom_filters( $this->filters )
		;
		if(\Input::get('columns'))
		{
			$result->columns(\Input::get('columns'));
		}
		return $result;
	}

}