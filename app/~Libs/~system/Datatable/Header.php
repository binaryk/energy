<?php namespace System;

class Header 
{
	protected static $instance = NULL;

	protected $caption = 'Column Header Caption';
	protected $style  = NULL;
	protected $filter  = false;

	public static function make()
	{
		return self::$instance = new Header();
	}

	public function __call($method, $args)
	{
		if(! property_exists($this, $method))
		{
			throw new \Exception(__CLASS__ . '. Property ' . $method . ' unknown.');
		}
		if( isset($args[0]) )
		{
			$this->{$method} = $args[0];
			return $this;
		}
		return $this->{$method};
	}

	protected function inputFilter($i)
	{
		if( ! $this->filter )
		{
			return '';
		}
		return '<div class="input-group dt-column-header-filter"><span class="input-group-btn"><button type="submit" name="column-search-' . $i . '" id="column-search-btn-' . $i . '" class="btn btn-flat btn-dt-header-search-by-column"><i class="fa fa-search"></i></button></span>
		<input type="text" id="column-q-' . $i . '" name="column-q-' . $i . '" class="form-control dt-header-search-by-column" placeholder="Căutare...">
		</div>';
	}

	public function cell($i)
	{
		// return '<th style="' . $this->style . ' !important">' . $this->caption . '</th>';
		$result = '<th style="' . $this->style . ' !important"><div class="row dt-header-container">';
		$result .= '<div class="col-xs-12 dt-header-caption">' . $this->caption . '</div>';
		$result .= '<div class="col-xs-12 dt-header-filter">' . $this->inputFilter($i) . '</div>';
		$result .= '</div></th>';
		return $result;
	}

}