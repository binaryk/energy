<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model

{
	protected $guarded = ['token'];
	protected $table = 'institutions';

	public static function getRecord( $id )
	{
		return self::find($id);
	}

	public static function createRecord($data )
	{	
		$data['organization_id'] = \Session::get('user_organization');
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

	public static function categories()
	{
		return [
			'1' => 'Gradinite',
			'2' => 'Scoli generale',
			'3' => 'Licee',
			'4' => 'Colegii',
			'5' => 'Grupuri scolare',
			'6' => 'Cladiri publice'
		];
	}
}
