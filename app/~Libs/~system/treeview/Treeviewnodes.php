<?php

namespace Treeview;

class Treeviewnodes 
{
	protected static $instance = NULL;

	protected $parameters = NULL;
	protected $source     = NULL;

	public static function make()
	{
		return self::$instance = new Treeviewnodes();
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

	protected function countTotal()
	{
		return $this->source->totalRecords();
	}

	protected function countFiltered()
	{
		return $this->source->totalFilteredRecords();
	}

	protected function data()
	{
		return $this->source->data();
	}

	public function nodes()
	{
		// dd($this->parameters);

		return \Response::json([
			// 'draw'            => $this->parameters['draw'],
			'recordsTotal'    => $this->countTotal(),
			'recordsFiltered' => $this->countFiltered(),
			'data'            => $this->data(),
			'currentOrder'    => $this->source->order(),
			// 'infos'           =>
			// 	[
			// 		'search-text' => $this->_searchtext,
			// 		'dt-where'    => $this->_dtwhere(),
			// 		'order'       => $this->_order(),
			// 		'limit'       => $this->limit,
			// 		'offset'      => $this->offset
			// 	]
		]);
	}
}