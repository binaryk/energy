<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddOrganizationIdTable extends Migration
{
    
    /* Run the migrations.  @return void */

    public function up()
    {

        Schema::table('institutions', function(Blueprint $t)
        {
            $t->integer('organization_id')->unsigned()->nullable();
        }); 
    }

    /* Reverse the migrations. @return void */

    public function down()
    {
        Schema::table('institutions', function(Blueprint $t)
        {
            $t->dropColumn('organization_id');
        });
    }
}
