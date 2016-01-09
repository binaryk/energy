<?php namespace App\Http\Controllers\Counters;

use App\Models\Institution;
use App\Models\Build;
use App\Models\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Support\Facades\Input;
use System\DatatableController;
use System\Grids;
use System\StdHelper;

class CountersController extends DatatableController
{
    use StdHelper;
    protected $layout = '~layouts.template.layout';

    public function index($id, $build_id){
        if(! $build = Build::find($build_id) ){
            return $this->try_($build);
        }
        if(! $institution = Institution::find($build->id) ){
            return $this->try_($institution);
        }
        $config = Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$build_id;
        $config['breadcrumbs'] = [
            [
                'name'      => 'Institutii de tip:' . Institution::categories()[$institution->category_id],
                'route'     => "institutions_index",
                'ids'       => ['type' => $institution->category_id]
            ],
            [
                'name'   => 'Clădirea '. $build->name,
                'route'  => 'buildings_index',
                'ids'    => ['institution_id' => $institution->id, 'id' => 'cladiri']
            ],
            [
                'name' => 'Contoare',
                'route'  => 'counters_index',
                'ids' => ['build_id' => $build_id,'id' => 'contoare']
            ],
        ];
       return $this->show( $config + ['other-info' => ['build' => $build]] );
    }

    public function rows($id, $build_id){
        if(! $build = Institution::find($build_id) ){
            return $this->try_($build);
        }
        if(! $institution = Institution::find($build->id) ){
            return $this->try_($institution);
        }
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'test' => 'counters.build_id = '.$build_id ] );
        return $this->dataset( $config );
    }

    public function furnizori()
    {
        $id_utilitate = Input::get('id');
        $out = [];
        $data = Supplier::where('type',$id_utilitate)->get()->toArray();
        foreach($data as $k => $d){
            $out[$d['id']] = $d['name'];
        }
        return ['options' => ['0' => count($out) > 0 ? '-- Selectati furnizor --' : '-- Nu are furnizor --'] + $out];
    }
}
