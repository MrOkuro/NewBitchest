<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablesTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('crypto_id');            
            $table->integer('quantite_crypto');
            //$table->string('type')->nullable();            
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('crypto_id')->references('id')->on('cryptos'); 
            $table->foreign('user_id')->references('id')->on('users');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
