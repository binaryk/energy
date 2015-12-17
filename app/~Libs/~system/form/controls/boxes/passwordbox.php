<?php

namespace Easy\Form;

class Passwordbox extends Base
{

	public static function make($view, $data = [])
	{
		return self::$instance = new Passwordbox($view, $data);
	}

}