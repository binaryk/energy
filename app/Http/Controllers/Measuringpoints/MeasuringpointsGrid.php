<?php namespace App\Http\Controllers\Measuringpoints;
use System\GridsRecord;

class MeasuringpointsGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'measuring_points.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Puncte de masurare a iluminatului public';
        $this->toolbar        = 'measuring_points.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Measuringpoints\MeasuringpointsForm';
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                              packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                              admin/css/dt/dt.css,
                              admin/css/dt/dtform.css,
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js,
                                        ';
        $this->row_source     = 'points_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM measuring_points
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM measuring_points :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM measuring_points';
        $this->columns        = [
            '1' => [
                'id'        => '#',
                'orderable' => 'no',
                'class'     => 'td-record-count td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Nr', 'style'   => 'width:3%',],
                'type'      => 'row-number',
                'source'    => 'row-number',
            ],
            '2' => [
                'id'        => 'address',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Adresa Punct De Masurare', 'style'   => 'width:30%',],
                'type'      => 'field',
                'source'    => 'address',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'locality',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Localitate', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'locality',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'county',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Judet', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'county',//numele coloanei din tabelul din BD
            ],
            '5' => [
                'id'        => 'nlc',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'NLC', 'style'   => 'width:20%',],
                'type'      => 'field',
                'source'    => 'nlc',//numele coloanei din tabelul din BD
            ],
            '6' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'measuring_points.~actions',
            ],
        ];
         $this->fields = [
            'fields'      => '',
            'searchables' => 'address',
            'orderables'  => [
                1 => 'address',
            ],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];
    }

    public static function create($id = NULL)
    {
        return self::$instance = new MeasuringpointsGrid($id);
    }
}