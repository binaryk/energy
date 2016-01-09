<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 1/9/2016
 * Time: 2:50 PM
 */

namespace App\Http\Controllers\Monitorizare;


use App\Models\Bill;
use App\Models\Build;
use App\Models\Counter;
use Carbon\Carbon;

trait ConsumLunar
{
    /*
     * @return
     * [
     *  '1' => [
     *     [
     *       'an' => 2015,
     *       'luni' => [ 0 => 15, 1 => 34, ... ]
     *     ],
     *  '2' => [
     *
     *      ]
     * ]
     * */
    public function consum_lunar($facturi)
    {
        $out = [];
        /*for($i = 1; $i <= 12; $i++){
            $out[$i] = [];
        }*/
        foreach($facturi as $k => $factura){
            $month = (new Carbon($factura->date_bill))->month;
            $year = (new Carbon($factura->date_bill))->year;

            if(array_key_exists($year, $out)){
                $out[$year]['value'] += (float) $factura->value_witch_tva;
                $out[$year]['months'][$month]  = array_key_exists($month, $out[$year]['months']) ? ( $out[$year]['months'][$month] +  (float) $factura->value_witch_tva ) : (float) $factura->value_witch_tva;
            }else{
                $out[$year] = [];
                $out[$year]['value'] = 0;
                $out[$year]['months'] = [];
                $out[$year]['months'] = _before_out($out[$year]['months'],1, 12);
                $out[$year]['value'] = (float) $factura->value_witch_tva;
                $out[$year]['months'][$month]  = (float) $factura->value_witch_tva;
            }
        }
        /*in out avem lunile si consumul total pe acele luni*/
        return $out;
    }
}