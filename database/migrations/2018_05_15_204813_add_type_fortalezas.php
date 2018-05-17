<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeFortalezas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fortalezas', function(Blueprint $table) {
            $table->string('tipo', 100)->default('fortaleza')->after('activity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fortalezas', function(Blueprint $table) { 
            $table->dropColumn('tipo');
        });
    }
}
