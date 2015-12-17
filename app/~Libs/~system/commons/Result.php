<?php

class Result 
{

	protected static $instance = NULL;

	protected $success      = NULL;
	protected $message      = NULL;
	protected $fieldserrors = NULL;


	public static function make()
	{
		return self::$instance = new Result();
	}

	public function __call($method, $args)
	{
		if(! property_exists($this, $method))
		{
			throw new \Exception(__CLASS__ . '. Property ' . $method . ' unknown.');
		}
		if( isset($args[0]) )
		{
			$this->{$method} = $args[0];
			return $this;
		}
		return $this->{$method};
	}

	public function out()
	{
		$result = new \StdClass();
		$result->success     = $this->success;
		$result->message     = $this->message;
		$result->fieldserrors = $this->fieldserrors;
		return $result;
	}

} 