<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_members', function (Blueprint $table) {
            $table->integer('student_number');
            $table->string('hometown');
            $table->string('study');
            $table->string('level_of_study');
            $table->integer( 'campus_residence');
            $table->dateTime( 'subscription_date');
            $table->string('position_held');
            $table->string( 'center_of_interest',1000);
            $table->string('faculty');
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
        Schema::dropIfExists('club_members');
    }
}
