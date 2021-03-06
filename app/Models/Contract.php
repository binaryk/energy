<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	protected $guarded = ['token'];
	protected $table = 'contracts_list';

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


    public static function byCounter($counter_id)
    {   
        
        $out = [];
        $data = self::where('counter_id','=', $counter_id)->get()->toArray();
        foreach($data as $k => $d){
            $out[$d['id']] = $d['nr_contract'];
        }
        return $out;
    }
}