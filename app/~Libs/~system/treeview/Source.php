<?php

namespace Treeview;

class Source 
{


	protected static $instance = NULL;

	protected $rowssql     = '';
	protected $countsql    = '';
	protected $totalsql    = '';
	protected $fields      = '';
	// protected $searchables = '';
	// protected $orderables  = '';
	// protected $cells       = '';

	protected $length     = NULL;
	protected $start      = NULL;
	// protected $search     = NULL;
	protected $order      = NULL;  // asta vine prin AJAX

	protected $getNodesMethod = NULL;

	public static function make()
	{
		return self::$instance = new Source();
	}

	public function __call($method, $args)
	{
		if(! property_exists($this, $method))
		{
			throw new \Exception(__CLASS__ .'. Property ' . $method . ' unknown.');
		}
		if( isset($args[0]) )
		{
			$this->{$method} = $args[0];
			return $this;
		}
		return $this->{$method};
	}

	protected function out($data)
	{
		return call_user_func($this->getNodesMethod, $data);
	}

	// protected function searchWhere()
	// {
	// 	$result = '';
	// 	foreach($this->searchables as $i => $field)
	// 	{
	// 		$result .= "(CAST(" . $field . " AS CHAR) LIKE '%" . $this->search['value'] ."%') OR ";
	// 	}
	// 	if( $result )
	// 	{
	// 		$result = ' WHERE ' . substr($result, 0, strlen($result) - 4);
	// 	}
	// 	return $result;
	// }

	// protected function order()
	// {
	// 	$result = '';
	// 	foreach($this->orderables as $i => $item)
	// 	{
	// 		if($this->order[0]['column'] == $i)
	// 		{
	// 			$result = $item . ' ' . strtoupper($this->order[0]['dir']);
	// 			break;
	// 		}
	// 	}
	// 	if( $result )
	// 	{
	// 		$result = ' ORDER BY ' . $result;
	// 	}
	// 	return $result;
	// }

	public function data()
	{

		// dd(  $this->searchWhere() );

		$sql = $this->rowssql;
		$sql = str_replace(':fields:', implode(',', $this->fields), $sql);
		$sql = str_replace(':where:', '' /* $this->searchWhere() */, $sql);
		$sql = str_replace(':order:', '' /* $this->order() */, $sql);

		$sql .= ' LIMIT ' . $this->length . ' OFFSET ' . $this->start;


		return $this->out(\DB::select( $sql ));
	}

	public function totalFilteredRecords()
	{
		$sql = $this->countsql;
		$sql = str_replace(':where:', '' /* $this->searchWhere() */, $sql);

		$result = \DB::select( $sql );
		if( array_key_exists(0, $result) )
		{
			return $result[0]->cnt;
		}
		return 0;
	}

	public function totalRecords()
	{
		$result = \DB::select( $this->totalsql );
		if( array_key_exists(0, $result) )
		{
			return $result[0]->cnt;
		}
		return 0;
	}

}