<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Organization\Organization;


class UsersOrganizationsTableSeeder extends Seeder 
{

    public function run()
    {
        DB::table('users_organizations')->truncate();

        $groups = [ 
            [
                'data' => [
                    'organization_id'     => '1',
                    'user_id'             => '1', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Draga Mea'
                ]
                
            ],
            [
                'data' => [
                    'organization_id'     => '2',
                    'user_id'             => '2', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Dumbrava Minunata'
                ]
                
            ], 
            [
                'data' => [
                    'organization_id'     => '3',
                    'user_id'             => '3', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr. 1'
                ],
            ],   
            [  
                'data' => [
                    'organization_id'     => '4',
                    'user_id'             => '1', 
                ],

                'organization' => [
                   'name' => 'Gradinita cu Program Prelungit Nr. 5'
                ],            
            ],
            [    
                'data' => [
                    'organization_id'     => '5',
                    'user_id'             => '4', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr.6'
                ],
            ],  
            [    
                'data' => [
                    'organization_id'     => '6',
                    'user_id'             => '5', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr.7'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '7',
                    'user_id'             => '6', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr. 9'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '8',
                    'user_id'             => '7', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit  Nr. 10'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '9',
                    'user_id'             => '1', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr. 11'
                ],
            ], 
            [    
                'data' => [
                    'organization_id'     => '10',
                    'user_id'             => '8', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr. 13'
                ],
            ], 
            [    
                'data' => [
                    'organization_id'     => '11',
                    'user_id'             => '8', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Voinicelul'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '12',
                    'user_id'             => '6', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr. 33'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '13',
                    'user_id'             => '4', 
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit 14 Mai'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '14',
                    'user_id'             => '9', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Grigore Moisil'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '15',
                    'user_id'             => '10', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala C-tin Brancoveanu'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '16',
                    'user_id'             => '11', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Balcescu Petofi'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '17',
                    'user_id'             => '12', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Mircea Eliade'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '18',
                    'user_id'             => '13', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Octavian Goga'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '19',
                    'user_id'             => '14', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Nr.10'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '20',
                    'user_id'             => '11', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Ion Creanga'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '21',
                    'user_id'             => '15', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Avram Iancu'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '22',
                    'user_id'             => '16', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Lucian Blaga'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '23',
                    'user_id'             => '17', 
                ],
                'organization' => [
                    'name' => 'Scoala Gimnaziala Vasile Lucaciu'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '24',
                    'user_id'             => '18', 
                ],
                'organization' => [
                    'name' => 'Colegiul National Mihai Eminescu'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '25',
                    'user_id'             => '19', 
                ],
                'organization' => [
                    'name' => 'Colegiul National Ioan Slavici'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '26',
                    'user_id'             => '20', 
                ],
                'organization' => [
                    'name' => 'Colegiul National D-na Stanca'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '27',
                    'user_id'             => '21', 
                ],
                'organization' => [
                    'name' => 'Colegiul National Kolcsey Ferenc'
                ],
            ], 
            [    
                'data' => [
                    'organization_id'     => '28',
                    'user_id'             => '22', 
                ],
                'organization' => [
                    'name' => 'Liceul Teologic Ortodox Nicolae Steinhardt'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '29',
                    'user_id'             => '23', 
                ],
                'organization' => [
                    'name' => 'Liceul de Arte Aurel Popp'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '30',
                    'user_id'             => '24', 
                ],
                'organization' => [
                    'name' => 'Liceul Teoretic German Johann Ettinger'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '31',
                    'user_id'             => '25', 
                ],
                'organization' => [
                    'name' => 'Liceul cu Program Sportiv'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '32',
                    'user_id'             => '21', 
                ],
                'organization' => [
                    'name' => 'Liceul Reformat'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '33',
                    'user_id'             => '26', 
                ],
                'organization' => [
                    'name' => 'Colegiul Tehnic de Transporturi Si Telecomunicatii Ion I. C. Bratianu'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '34',
                    'user_id'             => '27', 
                ],
                'organization' => [
                    'name' => 'Colegiul Economic Gheorghe DragoS'
                ],
            ], 
            [    
                'data' => [
                    'organization_id'     => '35',
                    'user_id'             => '28', 
                ],
                'organization' => [
                    'name' => 'Liceul Tehnologic C-tin Brancusi'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '36',
                    'user_id'             => '29', 
                ],
                'organization' => [
                    'name' => 'Liceul Tehnologic Industrie Alimentara George Emil Palade'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '37',
                    'user_id'             => '30', 
                ],
                'organization' => [
                    'name' => 'Colegiul Tehnic Traian Vuia'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '38',
                    'user_id'             => '31', 
                ],
                'organization' => [
                    'name' => 'Colegiul Tehnic Elisa Zamfirescu'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '39',
                    'user_id'             => '32', 
                ],
                'organization' => [
                    'name' => 'Liceul Teologic Romano Catolic Ham Janos'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '40',
                    'user_id'             => '33', 
                ],
                'organization' => [
                    'name' => 'Centrul Judetean de excelenta'
                ],
            ],
            [    
                'data' => [
                    'organization_id'     => '41',
                    'user_id'             => '34', 
                ],
                'organization' => [
                    'name' => 'Scoala Postliceala'
                ],
            ],


        ];

        foreach($groups as $grop){
            $organization = Organization::create($grop['organization']);
            $data = $grop['data'];
            DB::table('users_organizations')->insert($data);
        }


    }

} 