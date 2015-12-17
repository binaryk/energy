<?php

namespace Report;

class Report 
{
	public static function Create($config)
	{
		if( empty($config) )
		{
			throw new \Exception(__CLASS__ . '. Config not found.');
		}
		$rep = Datareport::make();
		$rep->id( $config['id'] );
		$rep->caption( $config['caption'] );
		$rep->icon( $config['icon'] );

		if( $config['custom_styles'] )
		{
			$rep->custom_styles( $config['custom_styles'] );
		}
		if( $config['custom_scripts'] )
		{
			$rep->custom_scripts( $config['custom_scripts'] );
		}
		return $rep;
	} 
} 