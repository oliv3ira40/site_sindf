<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCassiWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cassi_wallet', function (Blueprint $table) {
            $table->bigIncrements('id');

            // user_id
            $table->string('name', '200')->nullable();
            $table->string('cpf', '20')->nullable();
            $table->string('birth', '20')->nullable();
            $table->string('functional_enrollment', '40')->nullable();
            $table->string('Family', '20')->nullable();
            $table->string('dep', '10')->nullable();
            $table->string('uf', '10')->nullable();
            $table->string('contract_adhesion_date', '20')->nullable();
            $table->string('card', '40')->nullable();
            $table->string('situation_card', '20')->nullable();
            $table->string('shelf_life', '20')->nullable();
            $table->string('lot', '20')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('cassi_wallet');
    }
}
