<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Infrastructure;

class InfrastructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('category_id')->delete();

        $infrastructures = array(
                ['type' => 'Gradinite'],
                ['type' => 'Scoli generale'],
                ['type' => 'Licee'],
                ['type' => 'Colegii'],
                ['type' => 'Grupuri scolare'],
                ['type' => 'Cladiri publice'],
        );

        foreach ($infrastructures as $infrastructure)
        {
            Infrastructure::create($infrastructure);
        }

        Model::reguard();
    }
}
