<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages', function (Blueprint $table) {
            $table->date('datedebut');
            $table->date('datefin');
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
            $table->dropColumn('debut');
        });
        Schema::table('stages', function (Blueprint $table) {
            $table->dropColumn('fin');
        });
    }
}
