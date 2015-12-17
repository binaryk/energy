<?php

namespace Easy\Form;

class Textbox extends Base
{

	public static function make($view, $data = [])
	{

		return self::$instance = new Textbox($view, $data);
	}

}