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

        DB::table('type_infrastructures')->delete();

        $infrastructures = array(
                ['type' => 'kindergartens'],
                ['type' => 'schools'],
                ['type' => 'high schools'],
                ['type' => 'colleges'],
                ['type' => 'school groups'],
                ['type' => 'public buildings'],
        );

        foreach ($infrastructures as $infrastructure)
        {
            Infrastructure::create($infrastructure);
        }

        Model::reguard();
    }
}
