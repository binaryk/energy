<?php

namespace System;

class Forms
{

	protected static $instance = NULL;
	protected $forms =[];

	protected $maps = [
		 'institutions'       => 'App\Http\Controllers\Institutions\InstitutionsRules',
		 'cladiri'            => 'App\Http\Controllers\Buildings\BuildingsRules',
		 'contoare'           => 'App\Http\Controllers\Counters\CountersRules',
		 'programdmi'         => '\App\Http\Controllers\Programdmi\ProgramdmiRules',
		 'programoug'         => '\App\Http\Controllers\Programoug\ProgramougRules',
		 'vehicole'           => '\App\Http\Controllers\Vehicles\VehiclesRules',
		 'consum'             => '\App\Http\Controllers\Consumptions\ConsumptionsRules',
		 'factura'            => '\App\Http\Controllers\Bills\BillsRules',
		 'furnizori'          => '\App\Http\Controllers\Suppliers\SuppliersRules',
		 'puncte-de-masurare' => '\App\Http\Controllers\Measuringpoints\MeasuringpointsRules',

	];

	public function __construct($id)
	{
		$this->addForm( call_user_func([$this->maps[$id], 'create'], $id));
	}

	protected function addForm( FormsRecord $form)
	{
		$this->forms[$form->id] = $form;
		return $this;
	}

	public static function make($id)
	{
		return self::$instance = new Forms($id);
	}

	public function toFormConfig($id)
	{
		$record = $this->forms[$id];
		$result = new \StdClass();
		$result->captions = $record->captions(); 
		$result->buttons = $record->buttons(); 
		return $result;
	}

	public function toActionConfig($id)
	{
		$record = $this->forms[$id];
		$result = new \StdClass();
		$result->feedback = $record->feedback(); 
		$result->rules    = $record->rules();
		$result->messages = $record->messages();
		return $result;
	}

}