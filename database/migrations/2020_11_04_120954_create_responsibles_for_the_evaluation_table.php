<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsiblesForTheEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsibles_for_the_evaluation', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 200)->nullable()->default('---');
            $table->string('email', 150)->nullable();
            // evaluation_setting_id

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
        Schema::dropIfExists('responsibles_for_the_evaluation');
    }
}
