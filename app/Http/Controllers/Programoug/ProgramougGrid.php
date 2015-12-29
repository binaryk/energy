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
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js';
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
                'id'        => 'number',
                'orderable' => 'yes',
                'class'     => 'td-align-left',
                'visible'   => 'yes',
                'header'    => ['caption' => 'teeeeeesst', 'style'   => 'width:90%',],
                'type'      => 'field',
                'source'    => 'number',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'programs_oug.~actions',
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
        return self::$instance = new ProgramougGrid($id);
    }

}