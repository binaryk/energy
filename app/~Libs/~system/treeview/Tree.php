<?php

namespace Treeview;

class Tree
{
	public static function Create($config)
	{
		if( empty($config) )
		{
			throw new \Exception(__METHOD__ . '. Config not found.');
		}

		$tv = Treeview::make();

		$tv->id( $config['id'] ); 									
		$tv->displayStart( $config['display-start'] );				
		$tv->displayLength( $config['display-length'] );           
		$tv->nodeSourceUrl( $config['node-source'] );                
		// $dt->columns( $config['columns'] );                      
		// $dt->dom( $config['dom'] );                                
		$tv->name( $config['name'] );
		$tv->caption( $config['caption'] );
		$tv->icon( $config['icon'] );
		$tv->defaultOrder( $config['default-order'] );

		return $tv;
	} 
} 