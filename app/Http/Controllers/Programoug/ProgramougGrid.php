<?php namespace App\Http\Controllers\Programoug;
use System\GridsRecord;

class ProgramougGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'programs_oug.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista ';
        $this->toolbar        = 'programs_oug.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Programoug\ProgramougForm';
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                              packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                              admin/css/dt/dt.css,
                              admin/css/dt/dtform.css,
                              packages/daterangepicker/css/daterangepicker-bs3.css,
                              packages/datepicker/css/bootstrap-datepicker3.css
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js,
                              packages/daterangepicker/js/daterangepicker.js,
                              packages/datepicker/js/bootstrap-datepicker.js
                                        ';
        $this->row_source     = 'programoug_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM programs_oug
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM programs_oug :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM programs_oug';
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
                'id'        => 'address',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Adresa', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'address',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'locality',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Localitatea', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'locality',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'county',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Judetul', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'county',//numele coloanei din tabelul din BD
            ],
            '5' => [
                'id'        => 'owner',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Proiectant', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'owner',//numele coloanei din tabelul din BD
            ],
             '6' => [
                'id'        => 'realization_year',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Anul Realizarii', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'realization_year',//numele coloanei din tabelul din BD
            ],
            '7' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'programs_dmi.~actions',
            ],
        ];
         $this->fields = [
            'fields'      => '',
            'searchables' => 'id, address',
            'orderables'  => [
                1 => 'id',
                2 => 'address'
            ],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];

    }

    public static function create($id = NULL)
    {
        return self::$instance = new ProgramougGrid($id);
    }
}