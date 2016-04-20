<?php namespace App\Http\Controllers\Monitorizare;

use App\Models\Institution;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Build;
use Mockery\CountValidator\Exception;
use System\DatatableController;
use System\Grids;
use System\Log;
use System\StdHelper;

class BuildingsController extends DatatableController
{
    use StdHelper;
    protected $layout = '~layouts.template.layout';

    public function index($id){
        $config = Grids::make($id)->toIndexConfig($id);
        $config['breadcrumbs'] = [];
        return $this->show( $config + ['other-info' => [] ] );
    }

    public function rows($id){
        $organization_id = \Session::get('buildings');
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $type_client = $organization_id ? ['organization_id' => 'buildings.organization_id = '.$organization_id] : [];
        $config['source']->custom_filters( $filters + $type_client); 
        return $this->dataset( $config );
    }
}
