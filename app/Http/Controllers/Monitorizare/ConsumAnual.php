<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 1/9/2016
 * Time: 2:50 PM
 */

namespace App\Http\Controllers\Monitorizare;


use Carbon\Carbon;

trait ConsumAnual
{
    public function consum_anual($facturi)
    {
        $out = [];
        for($i = 1; $i <= 12; $i++){
            $out[$i] = 0;
        }
        foreach($facturi as $k => $factura){
            $month = (new Carbon($factura->date_bill))->year;
            $out[$month] += (float) $factura->value_witch_tva;
        }

        /*in out avem lunile si consumul total pe acele luni*/
        return $out;
    }
}