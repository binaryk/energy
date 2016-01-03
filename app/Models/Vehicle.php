<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model

{
	protected $guarded = ['token'];
	protected $table = 'vehicles';

	public static function getRecord( $id )
	{
		return self::find($id);
	}

	public static function createRecord($data )
	{
		return self::create($data);
	}

	public static function updateRecord($id, $data)
	{
		$record = self::find($id);
		if( ! $record )
		{
			return false;
		}
		return $record->update($data);
	}

	public static function deleteRecord($id, $data)
	{
		$record = self::find($id);
		if( ! $record )
		{
			return false;
		}
		return $record->delete();
	}

	public static function fleet()
	{
		return [
			'0' => 'Alegeti Flota',
			'Parc Auto Municipal'    => 'Parc Auto Municipal',
			'Transport Public Local' => 'Transport Public Local',
		];
	}
	public static function property()
	{
		return [
			'0' 					=> 'Alegeti Tipul Proprietatii',
			'Gestiune Proprie'      => 'Gestiune Proprie',
			'Leasing' 				=> 'Leasing',
			'Credit' 				=> 'Credit',
			'Chirie'				=> 'Chirie',
		];
	}
	public static function fuel()
	{
		return [
			'0' 					=> 'Alegeti Tipul Combustibilului',
			'Benzina'    			=> 'Benzina',
			'Motorina' 				=> 'Motorina',
			'Gaz Metan' 			=> 'Gaz Metan',
		];
	}
	public static function functions()
	{
		return [
			'0' 					=> 'Alegeti Tipul Functiei',
			'Transport Marfa'    	=> 'Transport Marfa',
			'Transport Persoane' 	=> 'Transport Persoane',
		];
	}
}