<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	protected $guarded = ['token'];
	protected $table = 'organizations';

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
	public function users()
    {
        return $this->belongsTo("App\Models\Access\User\User");
    }

}
