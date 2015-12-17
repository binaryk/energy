<?php

namespace Easy\HTML;

use Illuminate\Support\Collection;

class js
{
	protected static $instance = NULL;
	protected $files = NULL;

	public function __construct()
	{
		$this->files = new Collection();
	}

	public static function make()
	{
		return self::$instance = new js();
	}

	public function add($file)
	{
		if( is_string($file) )
		{
			$this->files->push($file);
		}
		else
			if( is_array($file) )
			{
				foreach($file as $i => $item)
				{
					$this->files->push($item);
				}
			}
		return $this;
	}

	public function out()
	{
		$result = '';
		foreach($this->files as $file)
		{
			$result .= \HTML::script( $file . '.js');
		}
		return $result;
	}
}