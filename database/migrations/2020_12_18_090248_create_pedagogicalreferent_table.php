<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedagogicalreferentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedagogicalreferent', function (Blueprint $table) {
            $table->boolean( 'administrative_officer');
            $table->boolean( 'professor');
            $table->string('faculty_or_department');
            $table->string('email_uir');
            $table->boolean( 'pedagogical_referent');
            $table->integer('id_user')->unique()->unsigned();
            

            $table->foreign('id_user')
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
        Schema::dropIfExists('pedagogicalreferent');
    }
}
