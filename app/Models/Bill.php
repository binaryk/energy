<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	protected $guarded = ['token'];
	protected $table = 'bills';

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

	public static function tip()
	{
		return [
			'0' => '--Alege--',
			'1' => 'Corectie',
			'2' => 'Estimare',
			'3' => 'Estimare+Regularizare',
			'4' => 'Regularizare'
		];
	}
}