<?php

namespace System;

class Route {

	protected static $instance = NULL;
	protected $routes = [];

	public function __construct() {
		$this
			/* Database general operations */

			->add('get', 'datatable-index', 'nomenclatoare/{id}', 'DatatableController@index', 'Administration')
			->add('get', 'datatable-row-source', 'nomenclatoare/row-source/{id}', 'DatatableController@rows', 'Administration')
			->add('post', 'datatable-load-form', 'nomenclatoare/load-dt-form/{id}', 'DatatableController@loadForm', 'Administration')
			->add('post', 'datatable-do-action', 'nomenclatoare/dt-do-action/{id}', 'DatatableController@doAction', 'Administration')

			->add('get', 'institutions_index', 'institutii/{type?}/{edit?}', 'InstitutionsController@index', 'Institutions')
			->add('get', 'institutions_index_row_source', 'institutii_row_source/{id}/{type?}', 'InstitutionsController@rows', 'Institutions')

			->add('get', 'buildings_index', 'institutie/{id}/{institution_id}', 'BuildingsController@index', 'Buildings')
			->add('get', 'buildings_index_row_source', 'buildings_index_row_source/{id}/{institution_id}', 'BuildingsController@rows', 'Buildings')

			->add('get', 'counters_index', 'institutie/cladire/{id}/{build_id}', 'CountersController@index', 'Counters')
			->add('get', 'counters_index_row_source', 'contoare_row_source/{id}/{build_id}', 'CountersController@rows', 'Counters')
		
			->add('get', 'programdmi_index', 'eficienta_energetica/{id}', 'ProgramdmiController@index', 'Programdmi')
			->add('get', 'programdmi_index_row_source', 'programdmi_row_source/{id}/', 'ProgramdmiController@rows', 'Programdmi')

			->add('get', 'programoug_index', 'eficienta-energetica/{id}', 'ProgramougController@index', 'Programoug')
			->add('get', 'programoug_index_row_source', 'programoug_row_source/{id}/', 'ProgramougController@rows', 'Programoug')

			->add('get', 'vehicles_index', 'transport-public/{id}', 'VehiclesController@index', 'Vehicles')
			->add('get', 'vehicles_index_row_source', 'vehicles_row_source/{id}/', 'VehiclesController@rows', 'Vehicles')

			->add('get', 'consumptions_index', 'transport-public/vehicol/{id}/{vehicle_id}', 'ConsumptionsController@index', 'Consumptions')
			->add('get', 'consumptions_index_row_source', 'consumptions_row_source/{id}/{vehicle_id}', 'ConsumptionsController@rows', 'Consumptions')

			->add('get', 'bills_index', 'institutie/cladire/contor/{id}/{counter_id}', 'BillsController@index', 'Bills')
			->add('get', 'bills_index_row_source', 'bills_row_source/{id}/{counter_id}', 'BillsController@rows', 'Bills')

			->add('get', 'suppliers_index', 'monitorizare-energetica/{id}', 'SuppliersController@index', 'Suppliers')
			->add('get', 'suppliers_index_row_source', 'suppliers_row_source/{id}/', 'SuppliersController@rows', 'Suppliers')

			->add('get', 'points_index', 'monitorizare_energetica/{id}', 'MeasuringpointsController@index', 'Measuringpoints')
			->add('get', 'points_index_row_source', 'points_row_source/{id}/', 'MeasuringpointsController@rows', 'Measuringpoints')

			->add('post', 'get_furnizor_by_utilitate', 'get_furnizor_by_utilitate', 'CountersController@furnizori', 'Counters')
		;
	}

	protected function add($method, $name, $uri, $action, $namespace) {
		$record = new \StdClass();
		$record->method = $method;
		$record->name = $name;
		$record->uri = $uri;
		$record->action = $action;
		$record->namespace = $namespace;
		$this->routes[] = $record;
		return $this;
	}

	public static function make() {
		return self::$instance = new Route();
	}

	public function define() {
		foreach ($this->routes as $i => $record) {
			\Route::{ $record->method}(
			$record->uri,
				[
					'as' => $record->name,
					'uses' => ($record->namespace ? $record->namespace . '\\' : '') . $record->action,
				]
			);
		}
	}

}