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
            $table->string('name_event')->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('theme', 1000);
            $table->string('needs_for_realization', 1000)->nullable();
            $table->Date('event_date');
            $table->time('event_time')->nullable();
            $table->string('location');
            $table->string('target_population')->nullable();
            $table->double('estimated_budget')->default(0.0);
            $table->string('communication_needs', 1000)->nullable();
            $table->json('clubs_involved')->nullable();
            $table->json('sponsors')->nullable();
            $table->string('event_link')->nullable();
            $table->string('pre_event_file')->nullable();
            $table->string('expected_benefits')->nullable();
            $table->mediumText('picture')->nullable();
            $table->string('club_name');
            $table->string('academic_year')->nullable();
            $table->integer('made_by')->nullable();
            $table->integer('submit_by')->nullable();
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
