<?php

namespace ToPDF;

/**
$this->pdf->SetFillColor($red, $green, $blue);
$this->pdf->SetFont($name, $style, $size);
**/
class cell
{
	protected static $instance 	= NULL;
	protected $properties 		= array(
		'text'          => array('value' => NULL, 'default' => ''),
		'top' 	    	=> array('value' => NULL, 'default' => NULL),
		'left' 	    	=> array('value' => NULL, 'default' => NULL),
		'width' 		=> array('value' => NULL, 'default' => 0),
		'height' 		=> array('value' => NULL, 'default' => 0),
		'border'    	=> array('value' => NULL, 'default' => ''),
		'halign'    	=> array('value' => NULL, 'default' => 'L'),
		'valign'    	=> array('value' => NULL, 'default' => 'M'),
		'linefeed' 		=> array('value' => NULL, 'default' => 0),
		'background' 	=> array('value' => NULL, 'default' => NULL),
		'font' 			=> array('value' => NULL, 'default' => array('freeserif' /*dejavusans'*/, '', 10)),
		'linesafter'    => array('value' => NULL, 'default' => 0),
		'textcolor'     => array('value' => NULL, 'default' => array(0, 0, 0))
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
			self::$instance = new cell($pdf);
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

	public function fontsize($size)
	{
		$this->properties['font']['value'][0] = $this->properties['font']['default'][0];
		$this->properties['font']['value'][1] = $this->properties['font']['default'][1];
		$this->properties['font']['value'][2] = $size;
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
		if($havebakground = is_array( $bk = $this->properties('background')))
		{
			$this->pdf->SetFillColor($bk[0], $bk[1], $bk[2]);
		}
		if($havefont = is_array($font = $this->properties('font')))
		{
			$this->pdf->SetFont($font[0], $font[1], $font[2], '', false);
		}
		if( $havetextcolor = is_array($textcolor = $this->properties('textcolor')) )
		{
			$this->pdf->SetTextColor($textcolor[0], $textcolor[1], $textcolor[2]);
		}
		if( 1 )
		{
			$this->pdf->MultiCell(
			 	$this->properties('width'), 
			 	$this->properties('height'), 
			 	$this->properties('text'), 
			 	$this->properties('border'), 
			 	$this->properties('halign'), 
			 	(int) $havebakground, 
			 	$this->properties('linefeed'), 
			 	$this->properties('left'),  
			 	$this->properties('top'), 
			 	true, 
			 	0, 
			 	false, 
			 	false, 
			 	$this->properties('height'), 
			 	$this->properties('valign')
			);
		}
		else
		{
			$this->pdf->ln(1);
		}
		if( ($lines = $this->properties('linesafter')) > 0)
		{
			$this->pdf->ln($lines);
		}
		if( $havetextcolor )
		{
			// $this->pdf->SetTextColor(0, 0, 0);
			$this->reset('textcolor');
		}
		return $this;
	}

}