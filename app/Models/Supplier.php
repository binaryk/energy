<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	protected $guarded = ['token'];
	protected $table = 'suppliers_list';

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
	public static function type_supplier()
	{
		return Counter::utilitate();

		return [
			'0'   => '--Alege--',
			'1'   => 'Electricitate',
			'2'   => 'Gaze Naturale',
			'3'   => 'Apa Potabila',
			'4'   => 'Energie Termica',
			'5'   => 'Combustibili Lichizi'
		];
	}
}
