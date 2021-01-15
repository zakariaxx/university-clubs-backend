<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('club_name');
            $table->integer('score');
            $table->integer('date');
            $table->string('decision');
            $table->string('evaluation');
            $table->timestamps();

           $table->foreign('club_name')
               ->references('club_name')->on('clubs')
               ->onDelete('cascade');

            $table->unique(array('club_name', 'date'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_evaluations');
    }
}
