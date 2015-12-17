<?php

/**
#1. Trebuie sa avem un view in care se genereaza un treeview
**/

namespace Treeview;

class TreeviewController extends \BaseController 
{

	public function show($config)
	{
		if( empty($config['view']) )
		{
			throw new \Exception(__METHOD__ . '. View parameter not defined.');
		}
		if( empty($config['name']) )
		{
			throw new \Exception(__METHOD__ . '. Javascript tree variable name not defined.');			
		}
		$this->layout->content = \View::make($config['view'])->with([
			'tv' => Tree::create($config)
		]);
	}

	public function dataset($config)
	{
		return Dataset::response($config);
	}

} 