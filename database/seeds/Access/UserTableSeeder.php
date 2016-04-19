<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Access\User\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $users = [ 
             
            [
                'name'              => 'Buzas Doina',
                'email'             => 'doina.buzas@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true
            ],   
    
            [  
                'name'              => 'Benedek Claudia',
                'email'             => 'claudia_benedek@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
            [    
                'name'              => 'Pintea Neta',
                'email'             => 'gradinita1sm@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],  
    
            [    
                'name'              => 'Veres Maria',
                'email'             => 'gradinita14mai2005@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Pintea Neta',
                'email'             => 'gpp7sm@yahoo.ro',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Borhidan Codruta',
                'email'             => 'borhidancodruta@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Olah Cristina',
                'email'             => 'gradinitaguliver@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ], 
    
            [    
                'name'              => 'Balasz Elisabeta',
                'email'             => 'voinicelul_contabilitate@yahoo.ro',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ], 
    
            [    
                'name'              => 'Bota Nicoleta',
                'email'             => 'nicoleta2002@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Izvor Mariana',
                'email'             => 'marianaizvor@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Bandula Doina',
                'email'             => 'balcescupetofi@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Lenghel Ileana',
                'email'             => 'scoala_eliade@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Bozga Carmen',
                'email'             => 'carmenbozga2013@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Simon Angela',
                'email'             => 'simon_ngl@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Costin Ana',
                'email'             => 'anacostin2000@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Pop Corina',
                'email'             => 'sc_blaga_sm@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Robotin Aurica',
                'email'             => 'aureliarobotin@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Mois Aurica',
                'email'             => 'auricapa@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Pop Ioan',
                'email'             => 'ionelpopsm@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Burulea Anna',
                'email'             => 'aburulea@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Penzes Magdolna',
                'email'             => 'ckfmagdi@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Erdei Radu',
                'email'             => 'raduerdei2004@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Nemethy Ildiko',
                'email'             => 'ildiiaku@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Nemeth Maria',
                'email'             => 'ltg@lgerm-ettinger.ro',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Stancovici Georgeta',
                'email'             => 'l_sportiv@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ], 
    
            [    
                'name'              => 'Dan Zamfira',
                'email'             => 'zamfira_1977@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Marc Viorica',
                'email'             => 'viorica_lic.economic@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Pop Monica',
                'email'             => 'monicasatumare1979@yahoo.ro',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Chirica Daniel',
                'email'             => 'danielchirica@gmail.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Demian Rodica',
                'email'             => 'contarodica@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Todor liliana',
                'email'             => 'lilianatodor@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Bicsi Ildiko',
                'email'             => 'bics.ildiko@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ], 
    
            [    
                'name'              => 'Petrut Maria',
                'email'             => 'miapetrut@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
    
            [    
                'name'              => 'Carausan Zamfira',
                'email'             => 'zamfira_carausan@yahoo.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true 
            ],
            [
                'name'              => 'Admin Istrator',
                'email'             => 'admin@admin.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true
    
            ],
            [
                'name'              => 'Default User',
                'email'             => 'user@user.com',
                'password'          => bcrypt('test123'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true
            ],

        ];

        DB::table('users')->truncate();

        foreach($users as $user){ 
            User::create($user);
        }
    }
}