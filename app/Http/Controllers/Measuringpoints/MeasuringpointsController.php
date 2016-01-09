<?php namespace App\Http\Controllers\Measuringpoints;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Point;
use System\DatatableController;
use System\Grids;

class MeasuringpointsController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    public function index($id){
        $config = Grids::make($id)->toIndexConfig($id); 
        $config['breadcrumbs'] = [
            [
                'name'   => 'Lista Furnizori',
                'route'  => 'points_index', 
                'ids'    => ['id' => 'puncte-de-masurare'],
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
        $config = Grids::make($id)->toRowDatasetConfig($id);
        return $this->dataset( $config );
    }
}
