<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('hotline_1', 12)->nullable();
            $table->string('hotline_2', 12)->nullable();
            $table->string('zalo', 12)->nullable();
            $table->text('link_facebook' )->nullable();
            $table->text('link_youtube')->nullable();
            $table->string('email', 65)->nullable();
            $table->string('open_time')->nullable();
            $table->string('domain', 65)->nullable();
            $table->string('slogan')->nullable();
            $table->text('link_google_map')->nullable();
            $table->text('iframe_google_map')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
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
        Schema::dropIfExists('setting');
    }
}
