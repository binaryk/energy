<?php namespace System;

class Dataset 
{

	public static function Response($config)
	{
		$response = Datatablerows::make();
		$response->source( $config['source'] );
		$response->draw(\Input::get('draw'));
		if(array_key_exists('other_infos', $config))
		{
			$response->other_infos($config['other_infos']);
		}
		return $response->rows();
	} 

} 