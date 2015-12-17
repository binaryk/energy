<?php

namespace Treeview;

use Illuminate\Support\Collection;

class Treeview
{
	protected static $instance = NULL;

	protected $id            = NULL;   // table id in the DOM 
	protected $nodeSourceUrl = NULL;   // server side row source url
	// protected $columns       = NULL;
	protected $displayStart  = 0;      // DT parameter
	protected $displayLength = 10;     // DT parameter
	// protected $dom           = '';
	protected $defaultOrder  = "?";

	protected $styles        = NULL;   // page styles
	protected $scripts       = NULL;   // page scripts

	protected $name          = NULL;
	protected $caption       = NULL;
	protected $icon          = NULL;

	public function __construct()
	{
		$this->styles = new Collection();
		$this->addStyleFile('packages/treeview/css/bootstrap-treeview.min.css');
		// $this->addStyleFile('packages/datatables/css/1.10.4/dataTables.bootstrap.css');
		// $this->addCss('vendors/datatable/1.10.4/datatable');
		// $this->addCss('vendors/datatable/1.10.4/dataTables.bootstrap');
		// $this->addCss('vendors/toggle/bootstrap-toggle');

		// $this->addCss('~admin/datatable');
		// $this->addCss('~admin/form');
		// $this->addCss('~admin/modal');
	
		$this->scripts = new Collection();
		$this->addScriptFile('packages/treeview/js/bootstrap-treeview.min.js');
		$this->addScriptFile('admin/js/libraries/treeview/treeview.js');
		// $this->addJs('vendors/maxlength/bootstrap-maxlength');
		// $this->addJs('vendors/toggle/bootstrap-to
	}

	public static function make()
	{
		return self::$instance = new Treeview();
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

	public function Tree()
	{
		return '<div id="' . $this->id . '" class=""></div>';
	}


	public function Init()
	{
		$js = "var " . $this->name . " = new TREEVIEW('" . $this->id . "').setUrl('" . $this->nodeSourceUrl . "').setDisplayStart(" . $this->displayStart . ").setDisplayLength(" . $this->displayLength . ").setDefaultOrder('" . $this->defaultOrder . "').getNodes()";
		return $js;
	}




	public function styles()
	{
		$result = '';
		foreach($this->styles as $i => $file)
		{
			$result .= \HTML::style($file);
		}
		return $result;
	}

	public function scripts()
	{
		$result = '';
		foreach($this->scripts as $i => $file)
		{
			$result .= \HTML::script($file);
		}
		return $result;
	}
}