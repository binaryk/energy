<?php

namespace System;

/**
 * Class Grids
 * @package Credite
 */
class Grids {

	protected static $instance = NULL;
	protected $grids = [];

	protected $maps = [
		'institutions' 		=> '\App\Http\Controllers\Institutions\InstitutionsGrid',
		'cladiri' 			=> '\App\Http\Controllers\Buildings\BuildingsGrid',
		'contoare' 		    => '\App\Http\Controllers\Counters\CountersGrid',
		'programdmi' 		=> '\App\Http\Controllers\Programdmi\ProgramdmiGrid',
		'programoug' 		=> '\App\Http\Controllers\Programoug\ProgramougGrid',
		'vehicole' 		    => '\App\Http\Controllers\Vehicles\VehiclesGrid',
		'consum' 		    => '\App\Http\Controllers\Consumptions\ConsumptionsGrid',
		'factura' 		    => '\App\Http\Controllers\Bills\BillsGrid',
		'furnizori' 		    => '\App\Http\Controllers\Suppliers\SuppliersGrid',

	];

	public function __construct($id) {
//        responsabilitatea lui este de apune in array-ul grids instanta obiectului creat
		$this->addGrid(call_user_func([$this->maps[$id], 'create'],$id));
	}

	protected function addGrid(GridsRecord $grid) {
//        aici (in array-ul grids, la key-ul trimis de noi) pune instanta obiectului dorit de noi, fie imobile, fie dezvoltatori etc.
		$this->grids[$grid->id] = $grid;
//        returneaza in constructor
		return $this;
	}
	/**
	 * @param $id
	 * @return Grids returneaza instanta obiectului particular
	 */
	public static function make($id) {
		return self::$instance = new Grids($id);
	}

	/**
	 * @param $id
	 * @return array cu cateva particularitati ale obiectului instantiat
	 */
	public function toIndexConfig($id) {
//        aici in $this->grids[$id] avem stabilita deja instanta obiectului particular pentru creare
		$record = $this->grids[$id];
		$result = [
			'id' => $record->id,
			'view' => $record->view,
			'ngCtrl' => $record->ngCtrl,
			'name' => $record->name,
			'display-start' => $record->display_start,
			'display-length' => $record->display_length,
			'default-order' => $record->default_order,
			'row-source' => \URL::route($record->row_source, ['id' => $record->id]),
			'dom' => $record->dom,
			'columns' => $record->columns(),
			'caption' => $record->caption,
			'icon' => $record->icon,
			'toolbar' => $record->toolbar,
			'form' => $record->form,
			'custom_styles' => $record->css,
			'custom_scripts' => $record->js,
			'breadcrumbs' => $record->breadcrumbs,
			'right_menu' => $record->right_menu,
		];
		return $result;
	}

	public function toRowDatasetConfig($id) {
		$record = $this->grids[$id];
		$result = [
			'id' => $record->id,
			'source' => $record->source(),
		];
		return $result;
	}

}