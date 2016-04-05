<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Access\User\User;
use App\Models\Organization\Organization;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $users = [ 
            [
                'data' => [
                    'name'              => 'Admin Istrator',
                    'email'             => 'admin@admin.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Draga Mea'
                ]
                
            ],
            [
                'data' => [
                    'name'              => 'Default User',
                    'email'             => 'user@user.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr. 5'
                ]
                
            ], 
            [
                'data' => [
                    'name'              => 'Buzas Doina',
                    'email'             => 'doina.buzas@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true
                ],
                'organization' => [
                    'name' => 'Gradinita cu Program Prelungit Nr. 11'
                ],
            ],   
            [  
                'data' => [
                    'name'              => 'Benedek Claudia',
                    'email'             => 'claudia_benedek@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],

                'organization' =>[
                   'name' => 'Gradinita cu Program Prelungit Dumbrava Minunata'
                ],            
            ],
            [    
                'data' => [
                    'name'              => 'Pintea Neta',
                    'email'             => 'gradinita1sm@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Gradinita cu Program Prelungit Nr. 1'
                ],
            ],  
            [    
                'data' => [
                    'name'              => 'Veres Maria',
                    'email'             => 'gradinita14mai2005@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Gradinita cu Program Prelungit Nr.6'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Pintea Neta',
                    'email'             => 'gpp7sm@yahoo.ro',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Gradinita cu Program Prelungit Nr.7'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Borhidan Codruta',
                    'email'             => 'borhidancodruta@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Gradinita cu Program Prelungit Nr. 9'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Olah Cristina',
                    'email'             => 'gradinitaguliver@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Gradinita cu Program Prelungit  Nr. 10'
                ],
            ], 
            [    
                'data' => [
                    'name'              => 'Balasz Elisabeta',
                    'email'             => 'voinicelul_contabilitate@yahoo.ro',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Gradinita cu Program Prelungit Nr. 13'
                ],
            ], 
            [    
                'data' => [
                    'name'              => 'Bota Nicoleta',
                    'email'             => 'nicoleta2002@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 Grigore Moisil'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Izvor Mariana',
                    'email'             => 'marianaizvor@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 C-tin Brâncoveanu'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Bandula Doina',
                    'email'             => 'balcescupetofi@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 B1lcescu Petofi'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Lenghel Ileana',
                    'email'             => 'scoala_eliade@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 Mircea Eliade'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Bozga Carmen',
                    'email'             => 'carmenbozga2013@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 Octavian Goga'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Simon Angela',
                    'email'             => 'simon_ngl@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 Nr.10'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Costin Ana',
                    'email'             => 'anacostin2000@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 Avram Iancu'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Pop Corina',
                    'email'             => 'sc_blaga_sm@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 Lucian Blaga'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Robotin Aurica',
                    'email'             => 'aureliarobotin@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Gimnazial1 Vasile Lucaciu'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Mois Aurica',
                    'email'             => 'auricapa@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Colegiul National Mihai Eminescu'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Pop Ioan',
                    'email'             => 'ionelpopsm@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Colegiul National Ioan Slavici'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Burulea Anna',
                    'email'             => 'aburulea@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Colegiul National D-na Stanca'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Penzes Magdolna',
                    'email'             => 'ckfmagdi@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Colegiul National Kolcsey Ferenc'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Erdei Radu',
                    'email'             => 'raduerdei2004@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Liceul Teologic Ortodox Nicolae Steinhard'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Nemethy Ildiko',
                    'email'             => 'ildiiaku@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Liceul de Arte Aurel Pop'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Nemeth Maria',
                    'email'             => 'ltg@lgerm-ettinger.ro',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Liceul Teoretic German Johann Ettinger'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Stancovici Georgeta',
                    'email'             => 'l_sportiv@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Liceul cu Program Sportiv'
                ],
            ], 
            [    
                'data' => [
                    'name'              => 'Dan Zamfira',
                    'email'             => 'zamfira_1977@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Colegiul Tehnic de Transporturi si Telecomunicatii Ion I. C. Bratianu'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Marc Viorica',
                    'email'             => 'viorica_lic.economic@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Colegiul Economic Gheorghe Dragos'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Pop Monica',
                    'email'             => 'monicasatumare1979@yahoo.ro',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Liceul Tehnologic C-tin Brancusi'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Chirica Daniel',
                    'email'             => 'danielchirica@gmail.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Liceul Tehnologic Industrie Alimentara George Emil Palade'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Demian Rodica',
                    'email'             => 'contarodica@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Colegiul Tehnic Traian Vuia'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Todor liliana',
                    'email'             => 'lilianatodor@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Colegiul Tehnic Elisa Zamfirescu'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Bicsi Ildiko',
                    'email'             => 'bics.ildiko@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Liceul Teologic Romano Catolic Ham Janos'
                ],
            ], 
            [    
                'data' => [
                    'name'              => 'Petrut Maria',
                    'email'             => 'miapetrut@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Centrul Judetean de excelenta'
                ],
            ],
            [    
                'data' => [
                    'name'              => 'Carausan Zamfira',
                    'email'             => 'zamfira_carausan@yahoo.com',
                    'password'          => bcrypt('test123'),
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'confirmed'         => true 
                ],
                'organization' =>[
                    'name' => 'Scoala Postliceala'
                ],
            ],

        ];

        DB::table('organizations')->truncate();
        DB::table('users')->truncate();

        foreach($users as $user){
            $organization = Organization::create($user['organization']);
            $data = $user['data'];
            $data['organization_id'] = $organization->id;
            User::create($data);

        }
    }
}