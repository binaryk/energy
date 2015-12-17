<?php

namespace Easy\Form;

class Checkbox extends Base
{
	
	public static function make($view, $data = [])
	{
		return self::$instance = new Checkbox($view, $data);
	}
	
}