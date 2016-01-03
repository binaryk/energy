<?php namespace App\Http\Controllers\Consumptions;
use System\GridsRecord;

class ConsumptionsGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'consumptions.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Consumuri';
        $this->toolbar        = 'consumptions.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Consumptions\ConsumptionsForm';
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                              packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                              admin/css/dt/dt.css,
                              admin/css/dt/dtform.css,
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js';
        $this->row_source     = 'consumptions_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM consumptions
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM consumptions :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM consumptions';
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
                'id'        => 'year_faz',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'An Faz', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'year_faz',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'month_faz',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Luna Faz', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'month_faz',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'month_distance',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Distanta Lunara Parcursa In Km', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'month_distance',//numele coloanei din tabelul din BD
            ],
            '5' => [
                'id'        => 'monthly_consumption',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Consumul Total Pe Luna In Litri', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'monthly_consumption',//numele coloanei din tabelul din BD
            ],
            '6' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'vehicles.~actions',
            ],
        ];
         $this->fields = [
            'fields'      => '',
            'searchables' => 'id','fleet_type',
            'orderables'  => [
                1 => 'id',
                2 => 'fleet_type'
            ],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];
    }

    public static function create($id = NULL)
    {
        return self::$instance = new ConsumptionsGrid($id);
    }
}