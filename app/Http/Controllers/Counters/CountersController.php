<?php namespace App\Http\Controllers\Counters;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Counter;
use System\DatatableController;
use System\Grids;

class CountersController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    protected function setPageContent($content)
    {
        return view($this->layout, ['content' => $content]);
    }

    public function index($type = NULL, $edit = NULL){
        $config = Grids::make('counters')->toIndexConfig('counters');
        $config['row-source'] .= $type ? '/'.$type  : '';
        $config['breadcrumbs'] = [
            [
                'name' => 'Contoare',
                'route'  => 'counters_index',
                'ids' => ''
            ],
        ];
        $content = $this->show( $config + ['other-info' => ['test' => '54864',]] );
       return $this->setPageContent($content);
    }

    public function rows($id, $type = NULL){
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        // $config['source']->custom_filters( $filters + [ 'test' => 'counters.infrastructure_id = 1' ] );
        return $this->dataset( $config );
    }
}
