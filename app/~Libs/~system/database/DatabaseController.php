<?php

namespace Database;

class DatabaseController extends \BaseController  
{

	protected function __prepare($data)
	{
		foreach($data as $key => $value)
		{
			if( $value === '%%%NULL%%%')
			{
				$data[$key] = NULL;
			}
		}
		return $data;
	}

	protected function __update($model, $data)
	{
		try
		{
			$record = $model::find($data['id']);
			$record->update( $this->__prepare($data) );
			$result = \Result::make()->success(true)->message('Actualizare cu success.');
		}
		catch(\Exception $e)
		{
			$result = \Result::make()->success(false)->message($e->getMessage());
		}
		return \Response::json([
			'success'      => $result->success(), 
			'message'      => $result->message(), 
			'fieldserrors' => $result->fieldserrors()
		]);
	}

	public function update()
	{
		return $this->__update( str_replace('|', '\\', \Input::get('model')), \Input::get('record') );
	}


	protected function toArray( $data )
	{
		$result = [];
		foreach($data as $id => $option)
		{
			$result[] = ['id' => $id, 'text' => $option];
		}
		return $result;
	}

	public function toCombobox()
	{
		$model = \Input::get('model');
		return \Response::json([
			'success' => true, 
			'options' => $this->toArray($model::toCombobox( \Input::get('id'), \Input::get('field')) )
		]);
	}

	protected function _columnsToSql($columns)
	{
		$result = '';
		foreach($columns as $i => $column)
		{
			$result .= $column['operation'] . '(' . $column['field'] . ') as ' . $column['as'] . ',';
		}
		return substr($result, 0, strlen($result) - 1);
	}

	public function totalizeColumns()
	{
		$sql = str_replace('::fields::', $this->_columnsToSql( $columns = \Input::get('columns')), \Input::get('sql'));
		$sql = str_replace('::where::', 'WHERE ' . \Input::get('where'), $sql);
		$select = \DB::select( $sql );
		$result = [];
		foreach ($columns as $i => $column) 
		{
			$result[$i] = ['result' => _toFloat($select[0]->{$column['as']}), 'dest' => $column['dest'] ];
		}
		return \Response::json($result);
	}

}