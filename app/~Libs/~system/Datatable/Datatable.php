<?php namespace System;

use Illuminate\Support\Collection;

class Datatable 
{
	protected static $instance = NULL;

	protected $id            = NULL;   // table id in the DOM 
	protected $ngCtrl        = NULL;   // table Controller Angular in the DOM
	protected $rowSourceUrl  = NULL;   // server side row source url
	protected $columns       = NULL;
	protected $displayStart  = 0;      // DT parameter
	protected $displayLength = 10;     // DT parameter
	protected $dom           = '';
	protected $defaultOrder  = "0, 'asc'";

	protected $styles        = NULL;   // page styles
	protected $scripts       = NULL;   // page scripts

	protected $name          = NULL;
	protected $caption       = NULL;
	protected $icon          = NULL;

	protected $custom_styles  = NULL;
	protected $custom_scripts = NULL;

	protected $header_filter  = false;

	public function __construct()
	{
		$this->styles = new Collection();
		$this->addStyleFile('packages/datatables/css/1.10.4/datatable.css');
		$this->addStyleFile('packages/datatables/css/1.10.4/dataTables.bootstrap.css');
		
//		$this->addStyleFile('admin/css/dt/dt.css');
//		$this->addStyleFile('admin/css/dt/toolbar.css');
//		$this->addStyleFile('admin/css/dt/dtform.css');

		$this->scripts = new Collection();
		$this->addScriptFile('packages/datatables/js/1.10.4/datatable.js');
		$this->addScriptFile('packages/datatables/js/1.10.4/dataTables.bootstrap.js');
		// $this->addScriptFile('___new-admin/packages/datatables/js/1.10.4/dataTables.bootstrap.js');
	}

	public static function make()
	{
		return self::$instance = new Datatable();
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

    protected function jscolumns()
    {
    	$result = '';
    	if( ! is_array($this->columns) )
    	{
    		throw new \Exception(__CLASS__ . '. Columns not an array.');
    	}
    	foreach($this->columns as $i => $column)
    	{
    		if( $column->visible() )
    		{
    			$result .= $column->js() . ',';
    		}
    	}
    	return '[' . substr($result, 0, strlen($result) - 1) . ']';
    }

	protected function parameters()
	{
		$result = '';
		$result .= " 'processing' : true";
		$result .= ", 'serverSide' : true";
		$result .= ", 'stateSave' : false";
		$result .= ", 'autoWidth' : false";
		$result .= ", 'pagingType' : 'full_numbers'";
		$result .= ", 'lengthMenu' : [[5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 100], [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 100]]";
		$result .= ", 'iDisplayStart' : " . $this->displayStart;
		$result .= ", 'iDisplayLength' : " . $this->displayLength;
		$result .= ", 'ajax' : {'url': '" . $this->rowSourceUrl . "', 'data' : function(d){}}";
		$result .= ", 'columns' : " . $this->jscolumns();
		$result .= ", 'dom' : '" . $this->dom . "'";
		$result .= ", 'order' : [[ " . $this->defaultOrder . " ]]";
		$result .= ", 'language' : {'searchPlaceholder' : 'Căutare...', 'sProcessing':'...','sLengthMenu':'_MENU_','sZeroRecords':'Nu sunt înregistrări','sInfo':'Înregistrările _START_ ... _END_ din _TOTAL_','sInfoEmpty':'0 înregistrări',	'sInfoFiltered': '(filtrate din _MAX_ înregistrări)','sInfoPostFix':'','sSearch':'','sUrl':'', 'oPaginate':{		'sFirst':'<i class=\"fa fa-angle-double-left\"></i>','sPrevious':'<i class=\"fa fa-angle-left\"></i>','sNext':'<i class=\"fa fa-angle-right\"></i>','sLast':'<i class=\"fa fa-angle-double-right\"></i>'}}";
		// $result .= ", 'language' : {'searchPlaceholder' : 'Search...', 'sProcessing':'...','sLengthMenu':'_MENU_','sZeroRecords':'No records','sInfo':'Records _START_ ... _END_ from _TOTAL_','sInfoEmpty':'0 records', 'sInfoFiltered': '','sInfoPostFix':'','sSearch':'','sUrl':'', 'oPaginate':{'sFirst':'<i class=\"fa fa-angle-double-left\"></i>','sPrevious':'<i class=\"fa fa-angle-left\"></i>','sNext':'<i class=\"fa fa-angle-right\"></i>','sLast':'<i class=\"fa fa-angle-double-right\"></i>'}}";
		/**
		Explicatie: 
		===========
		rowCallbak - pentru functionalitatea de selectie rand
		selected : id-ul randului (tr-ului) selectat
		daca este egal cu data.DT_RowId ==> se adauga clasa selected
		**/
		// $result .= ", 'rowCallback': function( row, data ) {
		// 	if ( data.DT_RowId == selected) 
		// 	{
		// 		$(row).addClass('selected');
		// 	}
		// }";
		return $result;
	}

	public function init()
	{
		$js = "var " . $this->name . " = $('#" . $this->id . "').DataTable({" . $this->parameters() . "}).on('draw.dt', function(event, settings){ console.log('Redraw occurred at: ' + new Date().toString() ); $('.btn-popover').popover(); /* console.log(settings) */ });";	
		return $js;
	}

	protected function header()
	{
		$result = '';
		if( ! is_array($this->columns) )
		{
    		throw new \Exception(__CLASS__ . '. Columns not an array.');
    	}
    	foreach($this->columns as $i => $column)
    	{
    		if($column->visible())
    		{
    			$result .= $column->header()->cell( $i );
    		}
    	}
    	return '<tr>' . $result . '</tr>';
	}

	public function table()
	{
		return '<table id="' . $this->id . '" class="table table-bordered table-hover"><thead>' . $this->header()  . '</thead></table>';
	}

	protected function _summary()
	{
		$result = '';
		foreach($this->columns as $i => $column)
    	{
    		if($column->visible())
    		{
    			$result .= '<div id="' . $this->id . '-summary-cell-' . ($i+1) . '" class="summary-cell" style="' . $column->header()->style() . '"></div>';
    		}
    	}
    	return $result . '<div class="clearfix"></div>';
	}

	public function summary()
	{
		return '<div class="summary-container">' . $this->_summary() . '</div>';	
	}

	protected function addCustomStyles()
	{
		if( $this->custom_styles )
		{
			foreach( explode(',', $this->custom_styles) as $i => $file)
			{
				$this->addStyleFile(trim($file));
			}
		}
	}

	protected function addCustomScripts()
	{
		if( $this->custom_scripts )
		{
			foreach( explode(',', $this->custom_scripts) as $i => $file)
			{
				$this->addScriptFile(trim($file));
			}
		}
	}

	public function styles()
	{
		$this->addCustomStyles();
		$result = '';
		foreach($this->styles as $i => $file)
		{
			$result .= \HTML::style($file);
		}
		return $result;
	}

	public function scripts()
	{
		$this->addCustomScripts();
		$result = '';
		foreach($this->scripts as $i => $file)
		{
			$result .= \HTML::script($file);
		}
		return $result;
	}
}