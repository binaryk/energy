<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
	protected $guarded = ['token'];
	protected $table = 'consumptions';

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
	public static function months()
	{
		return [
			'0'          => 'Alegeti Luna Faz',
			'Ianuarie'   => 'Ianuarie',
			'Februarie'  => 'Februarie',
			'Martie'     => 'Martie',
			'Aprilie'    => 'Aprilie',
			'Mai'        => 'Mai',
			'Iunie'      => 'Iunie',
			'Iulie' 	 => 'Iulie',
			'August'     => 'August',
			'Septembrie' => 'Septembrie',
			'Octombrie'  => 'Octombrie',
			'Noiembrie'  => 'Noiembrie',
			'Decembrie'  => 'Decembrie',
		];
	}
}
