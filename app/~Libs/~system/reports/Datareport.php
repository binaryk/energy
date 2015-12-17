<?php

namespace Report;

use Illuminate\Support\Collection;

class Datareport 
{
	protected static $instance = NULL;

	protected $id            = NULL;    
	protected $caption       = NULL;
	protected $icon          = NULL;

	// protected $rowSourceUrl  = NULL;   // server side row source url
	// protected $columns       = NULL;
	// protected $displayStart  = 0;      // DT parameter
	// protected $displayLength = 10;     // DT parameter
	// protected $dom           = '';
	// protected $defaultOrder  = "0, 'asc'";

	protected $styles        = NULL;   // page styles
	protected $scripts       = NULL;   // page scripts

	// protected $name          = NULL;
	

	protected $custom_styles  = NULL;
	protected $custom_scripts = NULL;

	public function __construct()
	{
		$this->styles = new Collection();
		$this->scripts = new Collection();
	}

	public static function make()
	{
		return self::$instance = new Datareport();
	} 

	public function addStyleFile($file)
	{
		$this->styles->push($file);
		return $this;
	}

	public function addScriptFile($file)
	{
		$this->scripts->push($file);
		return $this;
	}

	public function __call($method, $args)
	{
		if(! property_exists($this, $method))
		{
			throw new \Exception('Method: ' . __METHOD__ . '. File: ' . __FILE__ . '. Message: Property "' . $method . '" unknown.');
		}
		if( isset($args[0]) )
		{
			$this->{$method} = $args[0];
			return $this;
		}
		return $this->{$method};
	}

	protected function addCustomStyles()
	{
		if( $this->custom_styles )
		{
			foreach( explode(',', $this->custom_styles) as $i => $file)
			{
				$this->addStyleFile(trim($file));
			}
		}
	}

	protected function addCustomScripts()
	{
		if( $this->custom_scripts )
		{
			foreach( explode(',', $this->custom_scripts) as $i => $file)
			{
				$this->addScriptFile(trim($file));
			}
		}
	}

	public function styles()
	{
		$this->addCustomStyles();
		$result = '';
		foreach($this->styles as $i => $file)
		{
			$result .= \HTML::style($file);
		}
		return $result;
	}

	public function scripts()
	{
		$this->addCustomScripts();
		$result = '';
		foreach($this->scripts as $i => $file)
		{
			$result .= \HTML::script($file);
		}
		return $result;
	}
}