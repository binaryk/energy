<?php namespace App\Http\Controllers\Buildings;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Build;
use System\DatatableController;
use System\Grids;

class BuildingsController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    protected function setPageContent($content)
    {
        return view($this->layout, ['content' => $content]);
    }

    public function index($type = NULL, $edit = NULL){
        $config = Grids::make('buildings')->toIndexConfig('buildings');
        $config['row-source'] .= $type ? '/'.$type  : '';
        $config['breadcrumbs'] = [
            [
                'name' => 'Clădiri',
                'route'  => 'buildings_index',
                'ids' => ''
            ],
        ];
        $content = $this->show( $config + ['other-info' => ['test' => '54864',]] );
        return $this->setPageContent($content);
    }

    public function rows($id, $type = NULL){
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        // $config['source']->custom_filters( $filters + [ 'test' => 'buildings.institution_id = 1' ] );
        return $this->dataset( $config );
    }
}
