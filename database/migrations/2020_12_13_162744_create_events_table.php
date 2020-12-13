<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_event');
            $table->string('description', 1000);
            $table->Date('event_date');
            $table->string('place');
            $table->string('event_link')->nullable();
            $table->string('event_type');
            $table->mediumText('picture')->nullable();
            $table->integer('id_club');
            $table->timestamps();

            $table->foreign('id_club')
                ->references('id')
                ->on('clubs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
