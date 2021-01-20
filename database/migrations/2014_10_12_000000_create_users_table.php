<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')-> nullable();
            $table->string('last_name')->nullable();
            $table->string('user_name')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('verified')->default(User::UNVERIFIED_USER);
            $table->string('verification_token')->nullable();
            $table->string('civility');
            $table->boolean('activate')->default(User::DESACTIVATE_USER);
            $table->string('admin')->default(User::REGULAR_USER);
            $table->string('photo')->nullable();
            $table->boolean('club_office_member')->default(0);
            $table->integer('id_club')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
