<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToDebilidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('debilidades', function(Blueprint $table) {
            $table->string('tipo', 100)->default('debilidad')->after('activity_id');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('debilidades', function(Blueprint $table) { 
            $table->dropColumn('tipo');
        });
    }
}
