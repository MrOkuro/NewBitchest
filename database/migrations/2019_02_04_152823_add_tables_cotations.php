<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablesCotations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('crypto_id')->nullable();
            $table->float('valeur',10,4)->nullable();
            $table->float('cours',10,4)->nullable();
            $table->float('evolution',10,4)->nullable();
            $table->datetime('date')->nullable();
            //$table->decimal('taux',5,2)->nullable();
            //$table->timestamps();
        });
        
        Schema::table('cotations', function (Blueprint $table) {
            $table->foreign('crypto_id')->references('id')->on('cryptos');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotations');
    }
}
