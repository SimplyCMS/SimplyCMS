<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use System\Database\Models\Setting;

class SimplycmsSystemSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Setting::getTableName(), function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 30)->primary();
            $table->string('key')->index();
            $table->longText('value')->nullable();
            $table->string('category', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Setting::getTableName());
    }
}
