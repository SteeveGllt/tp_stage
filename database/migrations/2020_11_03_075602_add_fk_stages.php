<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkStages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages', function (Blueprint $table) {
            $table->unsignedBigInteger('entreprise_id');
        
            $table->foreign('entreprise_id')->references('id')->on('entreprises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stages', function (Blueprint $table) {
            $table->dropColmun('entreprise_id');    
    
        });
    }
}
