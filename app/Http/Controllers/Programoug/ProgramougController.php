<?php namespace App\Http\Controllers\Programoug;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Program_dmi;
use System\DatatableController;
use System\Grids;

class ProgramougController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    public function index($id){
        // dd($id);
        $config = Grids::make($id)->toIndexConfig($id); 
        $config['breadcrumbs'] = [
            [
                'name'   => 'Program OUG',
                'route'  => 'programoug_index',  
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
        $config = Grids::make($id)->toRowDatasetConfig($id);
        return $this->dataset( $config );
    }
}
