<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvailableQuestionsToResponsesReceivedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responses_received', function (Blueprint $table) {
            $table->unsignedBigInteger('available_question_id')->nullable();
            $table->foreign('available_question_id')
                ->references('id')->on('available_questions')
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
