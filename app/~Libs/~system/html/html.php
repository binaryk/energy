<?php

namespace Easy\HTML;

use Illuminate\Support\Collection;

/**
- vreau sa generez o portiune (block) HTML pe baza unui view
- daca are nevoie de css sa includa si css-urile
- daca are nevoie de js sa includa si js-urile
**/
class HTML
{
	protected static $instance = NULL;
	protected $view = NULL;
	protected $data = [];
	protected $css  = NULL;
	protected $js   = NULL;

	public function __construct($view, $data)
	{
		$this->view   = $view;
		$this->data   = $this->data + $data;
		$this->css    = new css();
		$this->js     = new js();
	}

	public function with($key, $value)
	{
		$this->data[$key] = $value;
		return $this;
	}

	public static function make($view, $data = [])
	{
		return self::$instance = new HTML($view, $data);
	}

	public function __call($method, $args)
	{
		if( isset($args[0]) )
		{
			return $this->with($method, $args[0]);
		}
		if( array_key_exists($method, $this->data) )
		{
			return $this->data[$method];
		}
		return NULL;
	}

	public function __get($property)
	{
		if( array_key_exists($property, $this->data) )
		{
			return $this->data[$property];
		}
		throw new \Exception('Invalid property "' . $property . '"');
	}

	public function addcss($file)
	{
		$this->css->add($file);
		return $this;
	}

	public function addjs($file)
	{
		$this->js->add($file);
		return $this;
	}

	public function css()
	{
		return $this->css->out();
	}

	public function js()
	{
		return $this->js->out();
	}

	protected function beforeOut()
	{
	}

	public function out()
	{
		$this->beforeOut();
		$this->withAngular();
		return \View::make($this->view, $this->data);
	}
}