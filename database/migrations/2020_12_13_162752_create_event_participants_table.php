<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participants', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('event_id')->unsigned();
            $table->integer('participant_id')->unsigned();
            $table->string('invitation')->nullable();
            $table->boolean('participate')->default(false);
            $table->string('first_name')->nullable();;
            $table->string('last_name')->nullable();;
            $table->string('email')->nullable();;
            $table->string('phone_number')->nullable();;
            $table->string('participation_code')->nullable();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('participant_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('event_participants');
    }
}
