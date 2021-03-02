<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEleveStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleve_stage', function (Blueprint $table) {
            $table->foreignId('eleve_id')->constrained();
            $table->foreignId('stage_id')->constrained();
            $table->primary(['stage_id', 'eleve_id']);
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
        Schema::dropIfExists('eleve_stage');
       
    }
}
