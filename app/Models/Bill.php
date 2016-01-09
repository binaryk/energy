<?php

namespace App\Models;

use Carbon\Carbon;
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

	public function setDateBillAttribute($value)
	{
		$date = Carbon::parse($value)->format('Y-m-d');
		$this->attributes['date_bill'] = strtolower($date);
	}

	public function getDateBillAttribute($value)
	{
		return $date = Carbon::parse($value)->format('m/d/Y');
	}

	public function setStartBillingAttribute($value)
	{
		$date = Carbon::parse($value)->format('Y-m-d');
		$this->attributes['start_billing'] = strtolower($date);
	}

	public function getStartBillingAttribute($value)
	{
		return $date = Carbon::parse($value)->format('m/d/Y');
	}

	public function setStopBillingAttribute($value)
	{
		$date = Carbon::parse($value)->format('Y-m-d');
		$this->attributes['stop_billing'] = strtolower($date);
	}

	public function getStopBillingAttribute($value)
	{
		return $date = Carbon::parse($value)->format('m/d/Y');
	}



	public function counter()
	{
		return $this->belongsTo('App\Models\Counter','counter_id');
	}
}