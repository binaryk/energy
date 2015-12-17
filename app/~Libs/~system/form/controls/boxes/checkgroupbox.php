<?php

namespace Easy\Form;

class Checkgroupbox extends Base
{
	
	public static function make($view, $data = [])
	{
		return self::$instance = new Checkgroupbox($view, $data);
	}
	
}