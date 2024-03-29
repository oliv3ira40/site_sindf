<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionTypesToAvailableQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('available_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('question_type_id')->nullable();
            $table->foreign('question_type_id')
                ->references('id')->on('question_types')
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
        Schema::table('available_questions', function (Blueprint $table) {
            //
        });
    }
}
