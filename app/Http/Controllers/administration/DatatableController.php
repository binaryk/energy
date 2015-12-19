<?php

namespace App\Http\Controllers\Administration;

use System\Forms;
use System\Grids;

class DatatableController extends \System\DatatableController
{
	protected $layout 		= '~layouts.template.layout';

    /**
     * @param $id
     * @throws \Exception
     */
    public function index($id)
	{
        $this->show( Grids::make($id)->toIndexConfig($id) );
	}

    public function test($cevq){

    }
    /**
     * @param $id
     * @return mixed
     */
    public function rows($id)
	{
		return $this->dataset( Grids::make($id)->toRowDatasetConfig($id) );
	}

    /**
     * @param $id
     * @return mixed
     */
    public function loadForm($id)
	{
		return $this->get_dtform_properties( Forms::make($id)->toFormConfig($id), \Input::all() );
	}

    /**
     * @return mixed
     */
    public function doAction()
	{
		return $this->do_action(Forms::make($id = \Input::get('code') )->toActionConfig($id), \Input::all() );
	}
}