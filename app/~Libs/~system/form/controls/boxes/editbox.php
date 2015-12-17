<?php

namespace Easy\Form;

class Editbox extends Base
{

	public static function make($view, $data = [])
	{
		return self::$instance = new Editbox($view, $data);
	}

}