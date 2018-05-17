<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToOportunidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oportunidades', function(Blueprint $table) {
            $table->string('tipo', 100)->default('oportunidad')->after('key_id');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oportunidades', function(Blueprint $table) { 
            $table->dropColumn('tipo');
        });
    }
}
