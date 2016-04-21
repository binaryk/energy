<?php namespace App\Http\Controllers\Publiclighting;

use App\Models\Supplier;
use App\Models\Point;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Light;
use Illuminate\Support\Facades\Input;
use System\DatatableController;
use System\Grids;
use System\StdHelper;

class PubliclightingController extends DatatableController
{   
    protected $layout = '~layouts.template.layout';

    public function index($id){
        // dd($id);
        $config = Grids::make($id)->toIndexConfig($id); 
        $config['breadcrumbs'] = [
            [
                'name'   => 'Lista Facturi',
                'route'  => 'publiclighting_index', 
                'ids'    => ['id' => 'facturi'],
            ], 
        ];
        return $this->show( $config );
    }

    public function rows($id){
        $config = Grids::make($id)->toRowDatasetConfig($id);
        return $this->dataset( $config );
    }
    public static function furnizori()
    {
        $out = [];
        $data = Supplier::where('type','=', 1)->get()->toArray();
        foreach($data as $k => $d){
            $out[$d['id']] = $d['name'];
        }
        return  $out;
    }
    public static function points()
    {
        $out = [];
        $data = Point::all()->toArray();
        foreach($data as $k => $d){
            $out[$d['id']] = $d['address'];
        }
        return  $out;
    }
}