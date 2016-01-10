<?php namespace App\Http\Controllers\Publiclighting;
use System\GridsRecord;

class PubliclightingGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'public_enlightments.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Facturi';
        $this->toolbar        = 'public_enlightments.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Publiclighting\PubliclightingForm';
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
        $this->row_source     = 'publiclighting_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM public_enlightments
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM public_enlightments :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM public_enlightments';
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
                'id'        => 'provider_id',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Denumire Furnizor', 'style'   => 'width:18%',],
                'type'      => 'view',
                'source'    => 'public_enlightments.~type_utility',
            ],
            '3' => [
                'id'        => 'measuring_point',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Punct De Masurare', 'style'   => 'width:18%',],
                'type'      => 'view',
                'source'    => 'public_enlightments.~type_point',
            ],
            '4' => [
                'id'        => 'nr_bill',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Numar Factura', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'nr_bill',//numele coloanei din tabelul din BD
            ], 
            '5' => [
                'id'        => 'date_of_issue',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Data Emitetii Facturii', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'date_of_issue',//numele coloanei din tabelul din BD
            ],
            '6' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'public_enlightments.~actions',
            ],
        ];
         $this->fields = [
            'fields'      => '',
            'searchables' => 'provider_id',
            'orderables'  => [
                1 => 'provider_id',
            ],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];
    }

    public static function create($id = NULL)
    {
        return self::$instance = new PubliclightingGrid($id);
    }
}