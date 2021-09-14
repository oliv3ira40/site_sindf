<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExclusiveConditionsForResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclusive_conditions_for_responses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 300)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('tag', 200)->nullable();

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
        Schema::dropIfExists('exclusive_conditions_for_responses');
    }
}
