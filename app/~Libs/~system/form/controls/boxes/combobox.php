<?php

namespace Easy\Form;

class Combobox extends Base
{

	public static function make($view, $data = [])
	{
		return self::$instance = new Combobox($view, $data);
	}

}