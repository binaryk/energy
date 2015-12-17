<?php

/**
 * Calin Verdes - COMPTECH SOFT SRL
 * Semnificatia parametrilor unei functii "validator"
 * $attribute  = (string) numele campului ce se valideaza
 * $value      = (string) valoarea campului ce se valideaza
 * $parameters = (array) parametrii suplimentari
**/

Validator::extend('oldpassword', function($attribute, $value, $parameters)
{
	if( ! array_key_exists(0, $parameters) )
	{
		return false;
	}
	$user = Sentry::findUserById( $id_user = (int) $parameters[0] );
	return $user->checkPassword($value);
});

Validator::extend('newpassword', function($attribute, $value, $parameters)
{
	if( ! array_key_exists(0, $parameters) )
	{
		return false;
	}
	return $value == $parameters[0];
});