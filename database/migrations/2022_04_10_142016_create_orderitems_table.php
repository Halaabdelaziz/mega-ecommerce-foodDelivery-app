<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->integer('count');
            $table->double('unit_price');
            $table->double('net_price');
            $table->string('address');
            $table->string('phone');
            $table->enum('status',['Pending','Info Received','In Transit','Out for Delivery','Delivered','Canceled']);
            $table->timestamps();
            // order id producct name totalprice count unit price net price(c*price) addrress phone deloevery fee
            // password
            // passconfrimation
            // post /resetpassword
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderitems');
    }
};
