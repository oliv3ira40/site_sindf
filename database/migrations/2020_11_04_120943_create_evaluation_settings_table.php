<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            // respondida uma única vez por usuário
            // enviar notificação para cada avaliação
            // login obrigatório
            // permitir grupos especificos de usuários

            $table->integer('answered_only_once_per_user')->nullable()->default(0);
            $table->integer('send_notification_for_each_assessment')->nullable()->default(0);
            $table->integer('login_required')->nullable()->default(0);
            $table->integer('allow_specific_groups_of_users')->nullable()->default(0);
            $table->dateTime('poll_start')->nullable();
            $table->dateTime('end_of_polls')->nullable();
            // evaluation_id

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
        Schema::dropIfExists('evaluation_settings');
    }
}
