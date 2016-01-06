<?php namespace App\Http\Controllers\Bills;
use System\GridsRecord;

class BillsGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'bills.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Facturi';
        $this->toolbar        = 'bills.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Bills\BillsForm';
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
        $this->row_source     = 'bills_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM bills
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM bills :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM bills';
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
                'id'        => 'nr_bill',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Nr Factura', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'nr_bill',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'type_bill',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip Factura', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'type_bill',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'consumption_billed',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Consum Facturat', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'consumption_billed',//numele coloanei din tabelul din BD
            ],
            '5' => [
                'id'        => 'value_witch_tva',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Val Tot cu T.V.A.', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'value_witch_tva',//numele coloanei din tabelul din BD
            ],
            '6' => [
                'id'        => 'date_bill',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Data Facturii', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'date_bill',//numele coloanei din tabelul din BD
            ],
            '7' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'bills.~actions',
            ],
        ];
         $this->fields = [
            'fields'      => '',
            'searchables' => 'id',
            'orderables'  => [
                1 => 'id',
            ],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];
    }

    public static function create($id = NULL)
    {
        return self::$instance = new BillsGrid($id);
    }
}