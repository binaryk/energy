<?php

namespace Easy\Form;

class Filebox extends Base
{
	
	public static function make($view, $data = [])
	{
		return self::$instance = new Filebox($view, $data);
	}
	
}