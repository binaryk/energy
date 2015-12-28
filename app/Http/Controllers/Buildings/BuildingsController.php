<?php namespace App\Http\Controllers\Buildings;

use App\Models\Institution;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Build;
use Mockery\CountValidator\Exception;
use System\DatatableController;
use System\Grids;

class BuildingsController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    public function index($id, $institution_id){
        if(! $institution = Institution::find($institution_id) ){
            throw new Exception(__CLASS__.' :: nu gasim instutie cu id-ul:: '.$institution_id);
        }
        $config = Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$institution_id;
        $config['breadcrumbs'] = [
            [
                'name'      => 'Institutii de tip:' . Institution::categories()[$institution->category_id],
                'route'     => "institutions_index",
                'ids'       => ['type' => $institution->category_id]
            ],
            [
                'name'   => 'Clădiri',
                'route'  => 'buildings_index',
                'ids'    => ['institution_id' => $institution_id, 'id' => 'cladiri']
            ],
        ];
        $config['caption'] .= ' ale institutiei: '. $institution->name;
        return $this->show( $config + ['other-info' => ['institution' => $institution]] );
    }

    public function rows($id, $institution_id){
        if(! $institution = Institution::find($institution_id) ){
            throw new Exception(__CLASS__.' :: nu gasim instutie cu id-ul:: '.$institution_id);
        }
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'test' => 'buildings.institution_id = '.$institution_id ] );
        return $this->dataset( $config );
    }
}
