<?php namespace App\Http\Controllers\Monitorizare;
use System\GridsRecord;

class CladiriGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'consum.cladiri.index';
        $this->ngCtrl         = '';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Clădiri';
        $this->toolbar        = 'consum.cladiri.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = null;
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                              packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                              admin/css/dt/dt.css,
                              admin/css/dt/toolbar.css,
                              admin/css/dt/dtform.css,
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js, custom/js/angular/controllers/buildCtrl.js, custom/js/angular/services/Count.js';
        $this->row_source     = 'consum_institutie_buildings_index_row_source';
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
                'header'    => ['caption' => 'Nume cladire', 'style'   => 'width:50%',],
                'type'      => 'field',
                'source'    => 'name',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'locality',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Localitatea', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'locality',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'consum.cladiri.~actions',
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
        return self::$instance = new CladiriGrid($id);
    }

}