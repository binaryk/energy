<?php namespace App\Http\Controllers\Buildings;
use System\GridsRecord;

class BuildingsGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'buildings.index';
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
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js';
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
                'header'    => ['caption' => 'Nume institutie', 'style'   => 'width:75%',],
                'type'      => 'field',
                'source'    => 'name',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'street',
                'orderable' => 'no',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Strada', 'style'   => 'width:11%',],
                'type'      => 'field',
                'source'    => 'street',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'nr',
                'orderable' => 'no',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Nr', 'style'   => 'width:4%',],
                'type'      => 'field',
                'source'    => 'nr',//numele coloanei din tabelul din BD
            ],
            '5' => [
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

    public static function create()
    {
        return self::$instance = new BuildingsGrid('buildings');
    }

}