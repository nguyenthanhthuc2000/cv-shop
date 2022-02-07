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
            $table->text('logo_header')->nullable();
            $table->text('logo_footer')->nullable();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('hotline_1', 12)->nullable();
            $table->string('hotline_2', 12)->nullable();
            $table->string('zalo', 12)->nullable();
            $table->string('facebook' )->nullable();
            $table->string('youtube')->nullable();
            $table->string('email', 65)->nullable();
            $table->string('domain', 65)->nullable();
            $table->string('logan')->nullable();
            $table->text('google_map')->nullable();
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
