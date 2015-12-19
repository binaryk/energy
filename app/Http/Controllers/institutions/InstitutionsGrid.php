<?php namespace App\Http\Controllers\Institutions;
use System\GridsRecord;

class InstitutionsGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'institutions.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Institutii';
        $this->toolbar        = 'institutions.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Institutions\InstitutionsForm';
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                                      packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                                      admin/css/dt/dt.css,
                                      admin/css/dt/toolbar.css,
                                      admin/css/dt/dtform.css,
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js';
        $this->row_source     = 'institutions_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM institutions
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM institutions :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM institutions';
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
                'header'    => ['caption' => 'Nume institutie', 'style'   => 'width:22%',],
                'type'      => 'field',
                'source'    => 'name',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-left td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'institutions.~actions',
            ],
        ];
        $this->fields = [
            'fields'      => '',
            'searchables' => 'id, name',
            'orderables'  => [],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];

    }

    public static function create()
    {
        return self::$instance = new InstitutionsGrid('institutions');
    }

}