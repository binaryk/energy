<?php namespace App\Http\Controllers\Vehicles;
use System\GridsRecord;

class VehiclesGrid extends GridsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this->view           = 'vehicles.index';
        $this->icon           = 'admin/img/icons/dt/settings.png';
        $this->caption        = 'Lista Vehicole';
        $this->toolbar        = 'vehicles.toolbar';
        $this->name           = 'dt';
        $this->display_start  = 0;
        $this->display_length = 10;
        $this->default_order  = "1,'asc'";
        $this->form           = 'App\Http\Controllers\Vehicles\VehiclesForm';
        $this->css            = 'packages/datatables/css/1.10.4/datatable.css,
                              packages/datatables/css/1.10.4/dataTables.bootstrap.css,
                              admin/css/dt/dt.css,
                              admin/css/dt/dtform.css,
                                       ';
        $this->js             = 'admin/js/libraries/form/dtform.js,
                                        ';
        $this->row_source     = 'vehicles_index_row_source';
        $this->rows_source_sql 				= 'SELECT
                                                *
                                                FROM vehicles
                                                :where: :order:';
        $this->count_filtered_records_sql 	= 'SELECT COUNT(*) as cnt FROM vehicles :where:';
        $this->count_total_records_sql     	= 'SELECT COUNT(*) AS cnt FROM vehicles';
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
                'id'        => 'fleet_type',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip Flota Auto', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'fleet_type',//numele coloanei din tabelul din BD
            ],
            '3' => [
                'id'        => 'vehicle_type',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip Vehicol', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'vehicle_type',//numele coloanei din tabelul din BD
            ],
            '4' => [
                'id'        => 'license_plate_number',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Numar De Inmatriculare', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'license_plate_number',//numele coloanei din tabelul din BD
            ],
            '5' => [
                'id'        => 'fuel_type',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'Tip Combustibil Utilizat', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'fuel_type',//numele coloanei din tabelul din BD
            ],
            '6' => [
                'id'        => 'year_of_manufacture',
                'orderable' => 'yes',
                'class'     => 'td-align-center',
                'visible'   => 'yes',
                'header'    => ['caption' => 'An Fabricatie', 'style'   => 'width:18%',],
                'type'      => 'field',
                'source'    => 'year_of_manufacture',//numele coloanei din tabelul din BD
            ],
            '7' => [
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
        return self::$instance = new VehiclesGrid($id);
    }
}