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
        $organization_id = \Session::get('user_organization');
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $type_client = $organization_id ? ['organization_id' => 'public_enlightments.organization_id = '.$organization_id] : [];
        $config['source']->custom_filters( $filters + $type_client);
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