<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationAppearanceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_appearance_settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('logo_for_white_background', 300)->nullable();
            $table->string('logo_for_black_background', 300)->nullable();
            $table->string('reduced_logo', 300)->nullable();
            $table->string('favicon', 300)->nullable();

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
        Schema::dropIfExists('application_appearance_settings');
    }
}
