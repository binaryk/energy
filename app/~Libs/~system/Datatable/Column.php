<?php namespace System;

class Column 
{
	protected static $instance = NULL;

	protected $id        = NULL;
	protected $header    = NULL;  // catre obiect Header (orice coloana are un Header)
	protected $orderable = false;
	protected $class     = NULL;
	protected $visible   = true;

	public function __construct($id)
	{
		$this->id = $id;
	}

	public static function make($id)
	{
		return self::$instance = new Column($id);
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

	public function js()
	{
		if( ! $this->visible )
		{
			return '';
		}
		$result = " 'data':'" . $this->id . "', 'orderable':" . ($this->orderable ? 'true' : 'false') . ", 'className':'" . $this->class . "'";
		return "{" . $result . "}";
	}
}
