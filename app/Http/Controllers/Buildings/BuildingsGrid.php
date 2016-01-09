<?php namespace App\Http\Controllers\Buildings;
use System\GridsRecord;

class BuildingsGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'buildings.index';
        $this->ngCtrl         = 'buildCtrl';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Clădiri';
        $this->toolbar        = 'buildings.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Buildings\BuildingsForm';
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                              packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                              admin/css/dt/dt.css,
                              admin/css/dt/toolbar.css,
                              admin/css/dt/dtform.css,
                              packages/daterangepicker/css/daterangepicker-bs3.css,
                              packages/datepicker/css/bootstrap-datepicker3.css
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js,custom/js/angular/controllers/buildCtrl.js, custom/js/angular/services/Count.js,
                              packages/daterangepicker/js/daterangepicker.js,
                              packages/datepicker/js/bootstrap-datepicker.js
                                        ';
        $this->row_source     = 'buildings_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM buildings
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM buildings :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM buildings';
        $this->columns        = [
            '1' => [
                'id'        => '#',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => '#', 'style'   => 'width:3%',],
                'type'      => 'row-number',
                'source'    => 'row-number',
            ],
           '2' => [
                'id'        => 'name',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Nume institutie', 'style'   => 'width:30%',],
                'type'      => 'field',
                'source'    => 'name',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'address',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Adresa', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'address',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'locality',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Localitatea', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'locality',//numele coloanei din tabelul din BD
            ],
            '5' => [
                'id'        => 'energy_responsable',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Responsabil Energetic', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'energy_responsable',//numele coloanei din tabelul din BD
            ],
            '6' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'buildings.~actions',
            ],
        ];
         $this->fields = [
            'fields'      => '',
            'searchables' => 'id, name',
            'orderables'  => [
                1 => 'id',
                2 => 'name'
            ],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];

    }

    public static function create($id = NULL)
    {
        return self::$instance = new BuildingsGrid($id);
    }

}