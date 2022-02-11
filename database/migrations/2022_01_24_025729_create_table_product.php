<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('slug');
            $table->string('code', 15)->nullable();
            $table->double('price')->default(0);
            $table->double('price_pro')->default(0);
            $table->text('content')->nullable();
            $table->text('desc')->nullable();
            $table->integer('category_id')->nullable(); //danh muc
            $table->string('photo')->nullable(); // ảnh đại diện
            $table->string('type')->nullable(); //vip/thường
            $table->dateTime('start_day')->nullable(); // ngày bắt đầu
            $table->dateTime('end_day')->nullable(); // ngày kết thúc
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('product');
    }
}
