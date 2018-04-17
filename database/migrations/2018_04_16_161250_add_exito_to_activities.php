<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExitoToActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function(Blueprint $table){
             $table->integer('alta')->nullable();   
             $table->integer('media')->nullable();   
             $table->integer('baja')->nullable();   
             $table->integer('muy_bueno')->nullable();   
             $table->integer('bueno')->nullable();   
             $table->integer('deficiente')->nullable();   
             $table->integer('muy_deficiente')->nullable();   
             $table->integer('valor')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function(Blueprint $table){           
            $table->dropColumn('alta');   
            $table->dropColumn('media');   
            $table->dropColumn('baja');   
            $table->dropColumn('muy_bueno');   
            $table->dropColumn('bueno');   
            $table->dropColumn('deficiente');   
            $table->dropColumn('muy_deficiente');   
            $table->dropColumn('valor');   
        });
    }
}
