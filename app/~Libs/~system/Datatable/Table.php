<?php namespace System;

class Table 
{
	public static function Create($config)
	{
		if( empty($config) )
		{
			throw new \Exception(__CLASS__ . '. Config not found.');
		}
		$dt = Datatable::make();
		$dt->id( $config['id'] ); 									// Table id in the DOM
		$dt->ngCtrl( $config['ngCtrl'] );
		$dt->displayStart( $config['display-start'] );				// DT offset parameter
		$dt->displayLength( $config['display-length'] );            // DT page length parameter
		$dt->rowSourceUrl( $config['row-source'] );                 // DT row source URL
		$dt->columns( $config['columns'] );                         // DT columns
		$dt->dom( $config['dom'] );                                 // DT dom
		$dt->name( $config['name'] );
		$dt->caption( $config['caption'] );
		$dt->icon( $config['icon'] );
		$dt->defaultOrder( $config['default-order'] );
//		$dt->header_filter( $config['header_filter']);
		if( $config['custom_styles'] )
		{
			$dt->custom_styles( $config['custom_styles'] );
		}
		if( $config['custom_scripts'] )
		{
			$dt->custom_scripts( $config['custom_scripts'] );
		}
		return $dt;
	} 
} 