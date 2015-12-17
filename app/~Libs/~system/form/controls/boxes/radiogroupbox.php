<?php

namespace Easy\Form;

class Radiogroupbox extends Base
{
	
	public static function make($view, $data = [])
	{
		return self::$instance = new Radiogroupbox($view, $data);
	}
	
}