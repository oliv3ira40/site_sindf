<?php

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
            $table->bigIncrements('id');
            
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('login', 30)->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephone', 20)->nullable();
            
            $table->string('cpf')->unique()->nullable();
            $table->string('registration', '40')->unique()->nullable();
            $table->string('registration_for_login', '40')->unique()->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->date('definitive_password')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
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
