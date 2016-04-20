<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program_dmi extends Model
{
	protected $guarded = ['token'];
	protected $table = 'programs_dmi';

	public static function getRecord( $id )
	{
		return self::find($id);
	}

	public static function createRecord($data)
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
}
