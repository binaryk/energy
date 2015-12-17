<?php

namespace System;

class Treeview extends \Eloquent
{
	protected $table = '_sys_treeviews';

	public static function byCode($code)
	{
		$record = self::where('treeview_code', $code)->get()->first();
		if( is_null($record) )
		{
			throw new \Exception(__METHOD__ . '. Treeview code [' . $code . '] unknown.');
		}
		return $record;
	}

	public static function toIndexConfig($code)
	{
		$record = self::byCode($code);
		return [
			'id'               => $record->treeview_code,
			'view'             => $record->view,
			'name'             => $record->js_treeview_name,
			'display-start'    => $record->display_start,
			'display-length'   => $record->display_length,
			'default-order'    => $record->default_order,
			'node-source'      => \URL::route($record->node_source_route_name, ['id' => $record->treeview_code]),
			// 'dom'              => $record->dom,
			// 'columns'          => self::toColumns($record->columns),
			'caption'          => $record->caption,
			'icon'             => $record->icon,
		];
	}

	public static function toNodeDatasetConfig($code)
	{
		$record = self::byCode($code);

		foreach(['fields', 'rows_source_sql', 'count_filtered_records_sql', 'count_total_records_sql', 'display_length'] as $i => $field)
		{
			if( empty($record->{$field}) )
			{
				throw new \Exception(__METHOD__ . '. Please fill the `' . $field . '` definition in sys_treeview table.');
			}
		}
/**
array(4) {
  ["id"]=>
  string(4) "tari"
  [""]=>
  string(1) "0"
  [""]=>
  string(2) "10"
  [""]=>
  string(2) "??"
}
**/
		return [
			'id'         => $code,
			'source'     => 
				\Treeview\Source::make()
				->length(\Input::get('displayLength'))
				->start(\Input::get('displayStart'))
				// ->search(\Input::get('search'))
				->order(\Input::get('defaultOrder'))				
				->rowssql($record->rows_source_sql)
				->countsql($record->count_filtered_records_sql)
				->totalsql($record->count_total_records_sql)				
				->fields(explode(',', json_decode($record->fields)->fields))
				->getNodesMethod($record->get_node_method)
				// ->searchables(explode(',', json_decode($record->fields)->searchables))
				// ->orderables( self::toOrderable(json_decode($record->fields)->orderables) )
				// ->cells(self::toCells($record->cells_formatters)),
		];
	}
}