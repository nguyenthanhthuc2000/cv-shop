<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_id')->nullable();
            $table->string('order_code');
            $table->tinyInteger('payment_status')->default(0);
            $table->integer('method_checkout')->default(0)->comment('0: thanh toán khi nhận hàng');
            $table->text('address');
            $table->text('note')->nullable();
            $table->integer('voucher_id')->nullable();
            $table->double('feeship')->default(0);
            $table->double('total')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('order');
    }
}
