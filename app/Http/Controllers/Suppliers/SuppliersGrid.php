<?php namespace App\Http\Controllers\Suppliers;
use System\GridsRecord;

class SuppliersGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'suppliers_list.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Furnizori';
        $this->toolbar        = 'suppliers_list.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Suppliers\SuppliersForm';
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                              packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                              admin/css/dt/dt.css,
                              admin/css/dt/dtform.css,
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js,
                                        ';
        $this->row_source     = 'suppliers_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM suppliers_list
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM suppliers_list :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM suppliers_list';
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
                'id'        => 'name',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Denumire Furnizor', 'style'   => 'width:28%',],
                'type'      => 'field',
                'source'    => 'name',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'type',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip Furnizor', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'type',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'unit_measurement',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'U.M.', 'style'   => 'width:8%',],
                'type'      => 'field',
                'source'    => 'unit_measurement',//numele coloanei din tabelul din BD
            ],
            '5' => [
                'id'        => 'address',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Adresa', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'address',//numele coloanei din tabelul din BD
            ],
            /*'6' => [
                'id'        => ' ',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Localizare', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => ' ',//numele coloanei din tabelul din BD
            ],*/
            '6' => [
                'id'        => 'action',
                'orderable' => 'no',
                'class'     => 'td-align-center td-actions',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Acțiuni', 'style'   => 'width:7%',],
                'type'      => 'view',
                'source'    => 'suppliers_list.~actions',
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
        return self::$instance = new SuppliersGrid($id);
    }
}