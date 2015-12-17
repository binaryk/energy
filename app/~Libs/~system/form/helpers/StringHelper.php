<?php

namespace Easy\Form;

class StringHelper
{

	public static function Items( $items, $separator = ', ' )
	{
		$result = '';
		foreach($items as $i => $value)
		{
			if( $value )
			{
				$result .= $value . $separator;
			}
		}
		if(! $result )
		{
			return $result;
		}
		return substr($result, 0, strlen($result) - strlen($separator) );
	}

	public static function Checked( $value )
	{
		$value = (bool) $value;
		return \HTML::image( \URL::to('/') . '/admin/img/symbols/' . ($value ? '' : 'un') . 'check.png' );
	}
}