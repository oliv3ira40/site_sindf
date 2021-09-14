<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasembrapaWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casembrapa_wallet', function (Blueprint $table) {
            $table->bigIncrements('id');

            // user_id
            $table->string('recipient', '100')->nullable();
            $table->string('registration', '40')->nullable();
            $table->string('cpf', '20')->nullable();
            $table->string('cns', '40')->nullable();
            $table->string('birth_date', '20')->nullable();
            $table->string('type', '20')->nullable();
            $table->string('plan', '30')->nullable();
            $table->string('validity_date_portfolio')->nullable();
            $table->string('stock_code', '20')->nullable();
            $table->string('situation', '20')->nullable();
            $table->string('email')->nullable();

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
        Schema::dropIfExists('casembrapa_wallet');
    }
}
