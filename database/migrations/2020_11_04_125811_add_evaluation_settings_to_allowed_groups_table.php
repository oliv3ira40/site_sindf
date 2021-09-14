<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEvaluationSettingsToAllowedGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allowed_groups', function (Blueprint $table) {
            $table->unsignedBigInteger('evaluation_setting_id')->nullable();
            $table->foreign('evaluation_setting_id')
                ->references('id')->on('evaluation_settings')
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
        Schema::table('allowed_groups', function (Blueprint $table) {
            //
        });
    }
}
