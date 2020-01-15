<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \System\Database\Models\SettingCategory;

class SimplycmsSystemSettingCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SettingCategory::getTableName(), function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 30)->primary();
            $table->string('name');
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
        Schema::dropIfExists(SettingCategory::getTableName());
    }
}
