<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddOrganizationIdTable extends Migration
{
    
    /* Run the migrations.  @return void */

    public function up()
    {
        Schema::table('programs_oug', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        });
        Schema::table('programs_dmi', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        });
        Schema::table('vehicles', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        });
        Schema::table('public_enlightments', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        }); 
        Schema::table('suppliers_list', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        });
        Schema::table('measuring_points', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        });
        Schema::table('statistical_indicators', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        });

        Schema::table('institutions', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        }); 
    }

    /* Reverse the migrations. @return void */

    public function down()
    {
        Schema::table('programs_oug', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
        Schema::table('programs_dmi', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
        Schema::table('vehicles', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
        Schema::table('public_enlightments', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
        Schema::table('suppliers_list', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
        Schema::table('measuring_points', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
        Schema::table('statistical_indicators', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
        Schema::table('institutions', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
    }
}
