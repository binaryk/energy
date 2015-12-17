<?php namespace System;

class Grids
{

	protected static $instance = NULL;
	protected $grids =[];

	protected $maps = [
		'profesor-clasele-mele'		=> '\Libs\ProfesorClaselemeleGridrecord',
		'profesor-clasa'			=> '\Libs\ProfesorClasaGridrecord',


		'parinte-materii-elev'		=> '\Libs\ParinteMateriielevGridrecord', // sunt notele vazute de parinte
		'parinte-absente-elev'		=> '\Libs\ParinteAbsenteelevGridrecord',


		/*Administrare (CRUD) pe entitati*/
		'admins-index'				=> '\Libs\AdministratoriGridrecord',
		'teachers-index'			=> '\Libs\TeachersGridrecord',
		'students-index'			=> '\Libs\StudentsGridrecord',
		'groups-index'				=> '\Libs\GroupsGridrecord',
		// 'content-press-articles' => '\Newadmin\PressarticlesGridrecord',


		// 'leads'				=> '\Newadmin\LeadsGridrecord',
		// 'lead-tasks'		=> '\Newadmin\LeadtasksGridrecord',
		// 'lead-history'      => '\Newadmin\LeadhistoryGridrecord',
		// 'agencies-accounts' => '\Newadmin\AgencyGridrecord',
		// 'tasks'				=> '\Newadmin\TasksGridrecord',
		// 'targets'			=> '\Newadmin\TargetsGridrecord',

		// 'task-subjects'		=> '\Newadmin\TasksubjectsGridrecord',
		// 'currencies'        => '\Newadmin\CurrenciesGridrecord',
		// 'countries'			=> '\Newadmin\CountriesGridrecord',
		// 'departments'		=> '\Newadmin\DepartmentsGridrecord',
		// 'contract-types'	=> '\Newadmin\ContracttypesGridrecord',
		// 'citizenships'		=> '\Newadmin\CitizenshipsGridrecord',
		// 'professions'		=> '\Newadmin\ProfessionsGridrecord',

		// 'agency-jobs'		=> '\Newadmin\AgencyjobsGridrecord',
		// 'agency-tasks'		=> '\Newadmin\AgencytasksGridrecord',
		// 'agency-invoices'	=> '\Newadmin\AgencyinvoicesGridrecord',
		// 'agency-docs'		=> '\Newadmin\AgencydocssGridrecord',
	];

	public function __construct($id)
	{
		$this->addGrid( call_user_func([$this->maps[$id], 'create']));
	}

	protected function addGrid( GridsRecord $grid)
	{
		$this->grids[$grid->id] = $grid;
		return $this;
	}

	public static function make($id)
	{
		return self::$instance = new Grids($id);
	}

	public function toIndexConfig($id)
	{
		$record = $this->grids[$id];
		$result = [	
			'id' 		     => $record->id,
			'view'		     => $record->view,
			'name'		     => $record->name,
			'display-start'  => $record->display_start,
			'display-length' => $record->display_length,
			'default-order'  => $record->default_order,
			'row-source'	 => \URL::route($record->row_source, ['id' => $record->id]),
			'dom'            => $record->dom,
			'columns'        => $record->columns(),
			'caption'        => $record->caption,
			'icon'           => $record->icon,
			'toolbar'        => $record->toolbar,
			'form'           => $record->form,
			'custom_styles'  => $record->css,
			'custom_scripts' => $record->js,
			'header_filter'  => $record->header_filter,
		];
		return $result;
	}

	public function toRowDatasetConfig($id)
	{
		$record = $this->grids[$id];
		$result = [
			'id' 		     => $record->id,
			'source'         => $record->source(),
		];
		return $result;
	}

}