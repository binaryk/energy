<?php 
namespace App\Http\Controllers\Programdmi;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Program_dmi;
use System\DatatableController;
use System\Grids;

class ProgramdmiController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    public function index($id){
        $config = Grids::make($id)->toIndexConfig($id); 
        $config['breadcrumbs'] = [
            [
                'name'   => 'POR DMI 12',
                'route'  => 'programdmi_index', 
                'ids'    => ''
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
        $type_client = $organization_id ? ['organization_id' => 'programs_dmi.organization_id = '.$organization_id] : [];
        $config['source']->custom_filters( $filters + $type_client); 
        return $this->dataset( $config );
    }
} 