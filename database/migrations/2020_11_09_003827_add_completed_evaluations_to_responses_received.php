<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompletedEvaluationsToResponsesReceived extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responses_received', function (Blueprint $table) {
            $table->unsignedBigInteger('completed_evaluation_id')->nullable();
            $table->foreign('completed_evaluation_id')
                ->references('id')->on('completed_evaluations')
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
        Schema::table('responses_received', function (Blueprint $table) {
            //
        });
    }
}
