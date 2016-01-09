<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model

{
	protected $guarded = ['token'];
	protected $table = 'counters';

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

	public static function utilitate()
	{
		return [
			'0' => '-- Alege --',
			'1' => 'Electricitate',
			'2' => 'Gaze Naturale',
			'3' => 'Apa',
		];
	}

	public function bills()
	{
		return $this->hasMany('\App\Models\Bill','counter_id');
	}

	public function build()
	{
		return $this->belongsTo('App\Models\Build','build_id');
	}
}