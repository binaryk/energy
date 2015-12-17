<?php

namespace ToPDF;

/**
$this->pdf->SetFillColor($red, $green, $blue);
$this->pdf->SetFont($name, $style, $size);
**/
class ellipse
{
	protected static $instance 	= NULL;
	protected $properties 		= array(
		'centerx'        => array('value' => NULL, 'default' => ''),
		'centery'        => array('value' => NULL, 'default' => ''),
		'razaz'          => array('value' => NULL, 'default' => ''),
		'razay'          => array('value' => NULL, 'default' => ''),
		'unghi'          => array('value' => 0, 'default' => 0),
		'unghistart'     => array('value' => 0, 'default' => 0),
		'unghistop'      => array('value' => 360, 'default' => 180),
	);
	
	protected $pdf 				= NULL;

	public function __construct($pdf)
	{
		$this->pdf = $pdf;
	}

	public static function make($pdf)
	{
		if( is_null(self::$instance) )
		{
			self::$instance = new ellipse($pdf);
		}
		return self::$instance;
	}

	public function properties($name = NULL)
	{
		if( is_null($name) )
		{
			$result = array();
			foreach($this->properties as $name => $property)
			{
				$result[$name] = $property['value'];
			}
			return $result;
		}

		if(array_key_exists($name, $this->properties))
		{
			return $this->properties[$name]['value'];
		}
		return NULL;
	}

	public function reset($name)
	{
		if(array_key_exists($name, $this->properties))
		{
			$this->properties[$name]['value'] = $this->properties[$name]['default'];
		}
		return $this;
	}

	public function __call($method, $args)
	{
		$method = strtolower($method);
		if(isset($args[0]))
		{
			$this->properties[$method]['value'] = $args[0];	
		}
		else
			if(array_key_exists($method, $this->properties))
			{
				$this->properties[$method]['value'] = $this->properties[$method]['default'];
			}
		return $this;
		
	}

	public function out()
	{
		
		$this->pdf->Ellipse(
			$this->properties('centerx'),
			$this->properties('centery'),
			$this->properties('razax'),
			$this->properties('razay'),
			$this->properties('unghi'),
			$this->properties('unghistart'),
			$this->properties('unghistop'),
			NULL, 
			NULL,
			NULL
		);

		return $this;
	}

}