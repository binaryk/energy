<?php namespace App\Http\Controllers\Institutions;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use System\DatatableController;
use System\Grids;

class InstitutionsController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    protected function setPageContent($content)
    {
        return view($this->layout, ['content' => $content]);
    }

    public function index($type = NULL, $edit = NULL){
        $config = Grids::make('institutions')->toIndexConfig('institutions');
        $config['row-source'] .= $type ? '/'.$type  : '';
        $config['breadcrumbs'] = [
            [
                'name' => 'Instituții',
                'route'  => 'institutions_index',
                'ids' => ''
            ],
        ];
        $content = $this->show( $config + ['other-info' => ['test' => '54864',]] );
       return $this->setPageContent($content);
    }

    public function rows($id, $type = NULL){
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [ 'test' => 'institutions.infrastructure_id = 1' ] );
        return $this->dataset( $config );
    }
}
