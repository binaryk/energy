<?php namespace App\Http\Controllers\Consumptions;

use App\Models\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Consumer;
use System\DatatableController;
use System\Grids;
use System\StdHelper;

class ConsumptionsController extends DatatableController
{   
    use StdHelper;
    protected $layout = '~layouts.template.layout';

    public function index($id, $vehicle_id){

        // dd(1);
        if(! $vehicle = Vehicle::find($vehicle_id) ){
            return $this->try_($vehicle);
        }
        $config = Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$vehicle_id;
        $config['breadcrumbs'] = [
            [
                'name'      => 'Lista Vehicole',
                'route'     => 'vehicles_index',
                'ids'       => ['id' => 'vehicole'],
            ],
            [
                'name'   => 'Consumuri',
                'route'  => 'consumptions_index',
                'ids'    => ['vehicle_id' => $vehicle_id, 'id' => 'consum']
            ],
        ];
        // $config['caption'] .= ' ale institutiei: '. $institution->name;
        // dd($config);
        return $this->show( $config + ['other-info' => ['vehicle' => $vehicle]] );
    }

    public function rows($id, $vehicle_id){
        if(! $vehicle = Vehicle::find($vehicle_id) ){
            return $this->try_($vehicle);
        }
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'test' => 'consumptions.vehicle_id = '.$vehicle_id ] );
        return $this->dataset( $config );
    }
}
