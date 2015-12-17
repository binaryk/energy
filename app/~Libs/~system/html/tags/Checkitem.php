<?php

namespace Easy\HTML;

use Illuminate\Support\Collection;


class Checkitem
{

	protected static $instance = NULL;

	protected $class      = '';
	protected $caption    = 'caption-?';
	protected $name       = 'chk-?';
	protected $checked    = true;
	protected $disabled   = true;
	protected $value      = 1;
	protected $attributes = [];

	public function __construct($data)
	{
		if( is_array($data) )
		{
			$this->set('caption', $data);
			$this->set('class', $data);
			$this->set('name', $data);
			$this->set('checked', $data);
			$this->set('disabled', $data);
			$this->set('attributes', $data);
			$this->set('value', $data);
		}
	}

	protected function set($key, $data)
	{
		if( array_key_exists($key, $data) )
		{
			$this->{$key} = $data[$key];
		}
	}

	public static function make($data = NULL)
	{
		return self::$instance = new Checkitem($data);
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

	public function out()
	{
		return '<div class="' . $this->class . '"><label>' . \Form::checkbox($this->name, $this->value, $this->checked, $this->attributes) . ' ' . $this->caption . '</label></div>';
	}
}

