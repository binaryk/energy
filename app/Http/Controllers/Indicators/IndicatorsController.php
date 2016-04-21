<?php 
namespace App\Http\Controllers\Indicators;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Indicator;
use System\DatatableController;
use System\Grids;

class IndicatorsController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    public function index($id){
        $config = Grids::make($id)->toIndexConfig($id); 
        $config['breadcrumbs'] = [
            [
                'name'   => 'Indicatori Statistici',
                'route'  => 'indicators_index', 
                'ids'    => ['id' => 'indicatori'],
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