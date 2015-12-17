<?php

// Validator::extend('no_duplicate', function($attribute, $value, $parameters)
// {
// 	/**
// 	parameters[0] => model
// 	parameters[1] => metoda
// 	parameters[i] => parametri
// 	**/
// 	$params = [];
// 	foreach($parameters as $i => $key)
// 	{
// 		if($i > 1)
// 		{
// 			$value = \Input::get($key);
// 			$params[] = $value ? $value : $key;
// 		}
// 	}
// 	return ! call_user_func([$parameters[0], $parameters[1]], $params);
// });

// Validator::extend('validoldpassword', function($attribute, $value, $parameters)
// {
// 	return Hash::check( \Input::get($attribute), \Auth::user()->password);
// });

// Validator::extend('containbankcode', function($attribute, $value, $parameters)
// {
// 	return 
// 		(\Input::get('data.' . $parameters[0]) == substr($value, 4, 4)) && 
// 		( 'RO' == substr($value, 0, 2));
// });

// Validator::extend('stadiuachizitievaloare', function($attribute, $value, $parameters)
// {
// 	if( in_array($id_tip_stadiu_achizitie = \Input::get('data.id_tip_stadiu'), [1, 2, 3, 4, 5, 6, 7]) )
// 	{
// 		return (float) $value > 0;
// 	}
// 	return true;
// });

// Validator::extend('stadiuachizitievaloareavizata', function($attribute, $value, $parameters)
// {
// 	if( in_array($id_tip_stadiu_achizitie = \Input::get('data.id_tip_stadiu'), [6]) )
// 	{
// 		return (float) $value > 0;
// 	}
// 	return true;
// });

// Validator::extend('valoareavanssolicitat', function($attribute, $value, $parameters)
// {
// 	if( in_array($solicita_avans = \Input::get('data.solicita_avans'), [1]) )
// 	{
// 		$proiect = \Gal\Nomenclatoare\Proiect::find( (int) ($id_proiect = \Input::get('data.id_proiect')) );
// 		if( ! $proiect )
// 		{
// 			$avans_solicitat = 0;
// 		}
// 		else
// 		{
// 			$contract = \Gal\Nomenclatoare\Contract::byProiect( (int) $id_proiect );
// 			if( ! $contract )
// 			{
// 				$avans_solicitat = 0;		
// 			}
// 			else
// 			{
// 				$avans_solicitat = $contract->avans_solicitat;
// 			}
// 		}
// 		return (float) $value <= (float) $avans_solicitat;
// 	}
// 	return true;
// });
