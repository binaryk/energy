<?php namespace System;

class Modal 
{
	protected static $instance = NULL;

	protected $view 		= '';
	protected $id 			= NULL;
	protected $closable     = false;
	protected $caption      = false;
	protected $body         = '';
	protected $footer       = '';

	public function __construct($view)
	{
		$this->view = $view;
	}

	public static function make($view)
	{
		return self::$instance = new Modal($view);
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

	protected function data()
	{
		$data = [
			'id' 			=> $this->id,
			'closable'      => $this->closable,
			'caption'       => $this->caption,
			'body'          => $this->body,
			'footer'        => $this->footer,
		];
		return $data;
	}

	public function out()
	{
		return \View::make($this->view)->with($this->data())->render();
	}
}