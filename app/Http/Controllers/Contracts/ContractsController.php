<?php namespace App\Http\Controllers\Contracts;

use App\Models\Counter;
use App\Models\Build;
use App\Models\Institution;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Support\Facades\Input;
use System\DatatableController;
use System\Grids;
use System\StdHelper;

class ContractsController extends DatatableController
{   
    use StdHelper;
    protected $layout = '~layouts.template.layout';

    public function index($id,  $counter_id){
        if(! $counter = Counter::find($counter_id) ){
            return $this->try_($counter);
        }
        if(! $build = Build::find($counter->id) ){
            return $this->try_($build);
        }
        if(! $institution = Institution::find($build->id) ){
            return $this->try_($institution);
        }
        if(! $counter = Counter::find($counter_id) ){
            return $this->try_($counter);
        }
        $config = Grids::make($id)->toIndexConfig($id);
        $config['row-source'] .= '/'.$counter_id;
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
                'ids' => ['build_id'  => $institution->id,'id' => 'contoare']
            ],
            [
                'name' => 'Contract',
                'route'  => 'contracts_index',
                'ids' => ['counter_id' => $counter_id,'id' => 'contract']
            ],
        ];
       return $this->show( $config + ['other-info' => ['counter' => $counter]] );
    }

    public function rows($id, $counter_id){
        if(! $counter = Counter::find($counter_id) ){
            return $this->try_($counter);
        }
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'test' => 'contracts_list.counter_id = '.$counter_id ] );
        return $this->dataset( $config );
    }
}
