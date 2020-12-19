<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('club_name')->unique();
            $table->string('description',1000);
            $table->string('email')->nullable();
            $table->string('club_type');
            $table->string('mission_objectives',1000);
            $table->date('creation_date');
            $table->string('office_member_list_file')->nullable();
            $table->string('club_logo')->nullable();
            $table->string('signalitic_file')->nullable();
            $table->float('caisse')->default(0.0);
            $table->string('constitution_file')->default(0);
            $table->boolean('activate')->default(0);
           /*  $table->boolean('id_pr')->default(0);

            $table->foreign('id_pr')
            ->references('id')
            ->on('pedagogicalreferent')
            ->onDelete('cascade'); */

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
        Schema::dropIfExists('clubs');
    }
}
