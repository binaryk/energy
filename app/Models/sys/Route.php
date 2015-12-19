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

			// ->add('get', 'home', '/', 'HomeController@showWelcome', '')
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