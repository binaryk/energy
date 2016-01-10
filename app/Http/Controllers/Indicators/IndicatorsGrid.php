<?php namespace App\Http\Controllers\Indicators;
use System\GridsRecord;

class IndicatorsGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'statistical_indicators.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Indicatori Statistici';
        $this->toolbar        = 'statistical_indicators.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Indicators\IndicatorsForm';
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                              packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                              admin/css/dt/dt.css,
                              admin/css/dt/dtform.css,
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js,
                                        ';
        $this->row_source     = 'indicators_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM statistical_indicators
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM statistical_indicators :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM statistical_indicators';
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
                'id'        => 'nr_indicator',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Indicator', 'style'   => 'width:10%',],
                'type'      => 'field',
                'source'    => 'nr_indicator',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'name',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Denumire Indicator', 'style'   => 'width:80%',],
                'type'      => 'field',
                'source'    => 'name',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'statistical_indicators.~actions',
            ],
        ];
         $this->fields = [
            'fields'      => '',
            'searchables' => 'name',
            'orderables'  => [
                1 => 'name',
            ],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];
    }

    public static function create($id = NULL)
    {
        return self::$instance = new IndicatorsGrid($id);
    }
}