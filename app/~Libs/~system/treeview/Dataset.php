<?php

namespace Treeview;

class Dataset 
{

	public static function Response($config)
	{
		$response = Treeviewnodes::make();
		$response->source( $config['source'] );
		return $response->nodes();
	} 

} 