<?php

namespace Report;

class Reportresponse 
{
	protected static $instance = NULL;

	protected $config       = NULL;
	protected $parameters  	= NULL;
	
	public function __construct($config, $parameters)
	{
		$this->config     = $config;
		$this->parameters = $parameters;
	}

	public static function make($config, $parameters)
	{
		return self::$instance = new Reportresponse($config, $parameters);
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

	public function result()
	{

		$create_pdf = CreatePDF::make($this->config);
		if( $this->parameters['action'] == 'pdf-download')
		{
			return $create_pdf->Out('F');
		}
		if( $this->parameters['action'] == 'pdf-open')
		{
			return $create_pdf->Out('I');
		}

		if( $this->parameters['action'] == 'pdf-print' )
		{
			return \Response::json([
				'action' => $this->parameters['action'],
				'file'   => \URL::to('reports/' . basename($file) ),
			]);
		}
	}
}