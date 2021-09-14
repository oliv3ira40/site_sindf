<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePossibleQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('possible_question_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('position')->nullable()->default(0);
            $table->string('response_text', 300)->nullable();
            $table->string('description', 1000)->nullable();
            // available_question_id
            // exclusive_condit_resp_id

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
        Schema::dropIfExists('possible_question_answers');
    }
}
