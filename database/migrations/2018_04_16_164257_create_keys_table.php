<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->integer('alta')->nullable();   
            $table->integer('media')->nullable();   
            $table->integer('baja')->nullable();   
            $table->integer('muy_positivo')->nullable();   
            $table->integer('positivo')->nullable();   
            $table->integer('negativo')->nullable();   
            $table->integer('muy_negativo')->nullable();   
            $table->integer('valor')->nullable(); 
            $table->unsignedInteger('force_id');
            $table->foreign('force_id')->references('id')
                ->on('forces')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keys');
    }
}
