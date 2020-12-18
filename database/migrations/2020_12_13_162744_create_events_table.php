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
            $table->string('theme', 1000);
            $table->string('needs_for_realization', 1000);
            $table->Date('event_date');
            $table->time('event_time');
            $table->string('location');
            $table->string('target_population');
            $table->double('estimated_budget');
            $table->string('communication_needs', 1000);
            $table->json('clubs_involved')->nullable();
            $table->json('sponsors')->nullable();
            $table->string('event_link')->nullable();
            $table->string('pre_event_file');
            $table->string('expected_benefits');
            $table->mediumText('picture')->nullable();
            $table->string('club_name');
            $table->string('academic_year');
            $table->integer('made_by');
            $table->integer('submit_by');
            $table->boolean('validate')->default(0);
            $table->boolean('published')->default(0);

            $table->timestamps();

            /*$table->foreign('id_club')
                ->references('id')
                ->on('clubs')
                ->onDelete('cascade');*/
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
