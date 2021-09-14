<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders_site', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title', '80')->nullable();
            $table->string('subtitle', '100')->nullable();
            $table->string('img', '400')->nullable();
            $table->string('link', '400')->nullable();
            $table->string('target', '10')->nullable();

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
        Schema::dropIfExists('sliders_site');
    }
}
