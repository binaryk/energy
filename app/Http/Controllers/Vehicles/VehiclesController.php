<?php namespace App\Http\Controllers\Vehicles;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use System\DatatableController;
use System\Grids;

class VehiclesController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    public function index($id){
        $config = Grids::make($id)->toIndexConfig($id); 
        $config['breadcrumbs'] = [
            [
                'name'   => 'Lista Vehicole',
                'route'  => 'vehicles_index', 
                'ids'    => ['id' => 'vehicole'],
            ],
            // [
            //     'name'      => $config['caption'] .= Institution::categories()[$type],
            //     'route'     => "institutions_index",
            //     'ids'       => ['type' => $type]
            // ]
        ];

        return $this->show( $config );
    }

    public function rows($id){
        $organization_id = \Session::get('user_organization');
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $type_client = $organization_id ? ['organization_id' => 'vehicles.organization_id = '.$organization_id] : [];
        $config['source']->custom_filters( $filters + $type_client); 
        return $this->dataset( $config );
    }
}
