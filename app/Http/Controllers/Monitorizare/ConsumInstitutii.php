<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 1/9/2016
 * Time: 2:48 PM
 */

namespace App\Http\Controllers\Monitorizare;


use App\Http\Controllers\Controller;
use App\Models\Build;
use Arcanedev\Support\Collection;
use Illuminate\Support\Facades\Input;
use System\Modal;
use System\StdHelper;

class ConsumInstitutii extends Controller
{
    use ConsumAnual;
    use ConsumLunar;
    use StdHelper;

    protected  $out_months = [];
    protected  $out_years  = [];

    public function __construct()
    {

    }
    /*
        *Aici am:
         * id - id-ul cladirii
         * type - tipul de facturi (pe care sa le filtrez pe cladirea respectiva) 1 - Electricitate, 2 - Gaze, 3 - Apa
    */
    public function byType($type, $id)
    {
        if(! $cladire = Build::find($id) ){
            return $this->try_($cladire);
        }
        $cladirea = Build::with('counters.bills')->where('id',$id)->first();
        $out = new Collection();
        foreach($cladirea['counters'] as $k => $contor){
            foreach($contor['bills'] as $i  => $factura){
                if($factura['type_bill'] == $type){
                    $out->push($factura);
                }
            }
        }

        /* out -> toate facturile pe tipul respectiv */
        $out = $this->sortDateAsc($out);
        $this->out_months       = $this->consum_lunar($out);
        $all = $this->out_months;
        $t = array_values($all);
        $first = array_shift($t);
        $data = $first['months'];
        $header = '';
        $content   = '';
        $i = 0;
        foreach($all as $k => $al){
            $class = $i == 0 ? 'active' : '';
            $i++;
            $header .= view('consum.lunar.tabs.title')->with(['id' => $k, 'class' => $class])->render();
            $content .= view('consum.lunar.tabs.model')->with(['id' => $k, 'data' => $al, 'class' => $class])->render();
        }
        $tabs = view('consum.lunar.tabs.index')->with(['header' => $header,'content' => $content])->render();
        if(count($all) == 0){
            return redirect()->back()->withFlashWarning('Nu sunt date suficinte pentru acest tip de raport');
        }
        return $view = view('consum.lunar.index')->with( compact('data','chart', 'data','tabs','all') );
    }

    public function sortDateAsc($data)
    {
        $bills = $data->sortBy(function($bill)
        {
            return $bill->date_bill;
        });
        return $bills;
    }

}