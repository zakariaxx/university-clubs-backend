<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearActionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_action_plans', function (Blueprint $table) {
            $table->increments('id');
             $table->string(  'event_name');
             $table->string( 'description');
             $table->string( 'location');
             $table->string( 'academic_year');
             $table->string( 'estimated_budget');
             $table->string( 'event_date');
             $table->string( 'event_time');
             $table->integer('id_club');
             $table->timestamps();

            $table->foreign('id_club')->references('id')->on('clubs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('year_action_plans');
    }
}
