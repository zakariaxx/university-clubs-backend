<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->String('title');
            $table->String('object');
            $table->Date('meeting_date');
            $table->Time('meeting_time');
            $table->json('participant_list');
            $table->String('link');
            $table->String('location');
            $table->boolean('repeat')->default(0);
            $table->integer('creatby');
            $table->timestamps();


            $table->foreign('creatby')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('meetings');
    }
}
