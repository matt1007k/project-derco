<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToAmenazas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amenazas', function(Blueprint $table) {
            $table->string('tipo', 100)->default('amenaza')->after('key_id');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amenazas', function(Blueprint $table) { 
            $table->dropColumn('tipo');
        });
    }
}
