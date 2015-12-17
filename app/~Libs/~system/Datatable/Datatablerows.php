<?php namespace System;

class Datatablerows 
{
	protected static $instance = NULL;

	protected $draw        = NULL;
	protected $source      = NULL;
	protected $other_infos = NULL;

	public static function make()
	{
		return self::$instance = new Datatablerows();
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
		return $this->source->data($this->other_infos);
	}

	public function rows()
	{
		return \Response::json([
			'draw'            => $this->draw,
			'recordsTotal'    => $this->countTotal(),
			'recordsFiltered' => $this->countFiltered(),
			'data'            => $this->data(),
			'currentOrder'    => $this->source->order(),
		]);
	}
}