<?php

namespace Easy\Form;

class CompoboxHelper
{

	public static function YearToCombobox()
	{
		$result = [];
		for($i = \Carbon\Carbon::now()->format('Y'); $i >= 1990; $i--)
		{
			$result[$i] = $i; 
		}
		return ['0' => '-'] + $result;
	}
    
    public static function HourToCombobox()
    {
        $result = [];
        for($i = 1; $i <= 24; $i++)
        {
            $result[$i] = $i; 
        }
        return ['0' => '-'] + $result;
    }

    public static function DurataMonitorizareContractFinantare()
	{
		$result = [];
		for($i = 1; $i <= 5; $i++)
		{
			$result[$i] = $i . ' ' . ($i == 1 ? 'an' : 'ani'); 
		}
		return ['0' => ' -- Selectati durata de monitorizare --'] + $result;
	}

	public static function Numartranseplata()
	{
		$result = [];
		for($i = 1; $i <= 5; $i++)
		{
			$result[$i] = $i; 
		}
		return ['0' => '-'] + $result;
	}

	public static function YesNo()
	{
		return ['0' => 'Nu', '1' => 'Da'];
	}

}