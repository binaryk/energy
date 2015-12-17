<?php

namespace Easy\HTML;

use Illuminate\Support\Collection;


class Listitem
{

	protected static $instance = NULL;

	protected $divider = false;
	protected $url     = NULL;
	protected $caption = NULL;

	public function __construct($data)
	{
		if( is_array($data) )
		{
			$this->set('caption', $data);
			$this->set('url', $data);
			$this->set('divider', $data);
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
		return self::$instance = new Listitem($data);
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
		if( $this->divider )
		{
			return '<li class="divider"></li>';
		}
		if( $this->url )
		{
			return '<li>' . \HTML::link($this->url, $this->caption) . '</li>';
		}
		return '<li>' . $this->caption . '</li>';
	}
}