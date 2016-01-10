<?php namespace App\Http\Controllers\Contracts;
use System\GridsRecord;

class ContractsGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'contracts_list.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Contracte';
        $this->toolbar        = 'contracts_list.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Contracts\ContractsForm';
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
        $this->row_source     = 'contracts_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM contracts_list
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM contracts_list :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM contracts_list';
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
                'id'        => 'nr_contract',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Numar Contract', 'style'   => 'width:50%',],
                'type'      => 'field',
                'source'    => 'nr_contract',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'signature_date',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Data Semnare', 'style'   => 'width:40%',],
                'type'      => 'field',
                'source'    => 'signature_date',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'contracts_list.~actions',
            ],
        ];
         $this->fields = [
            'fields'      => '',
            'searchables' => 'nr_contract',
            'orderables'  => [
                1 => 'nr_contract',
            ],//[1 => "id"],
        ];
        $this->filters = [
            'deleted' => 'deleted_at is null',
        ];
    }

    public static function create($id = NULL)
    {
        return self::$instance = new ContractsGrid($id);
    }
}