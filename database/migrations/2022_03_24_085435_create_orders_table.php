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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('payment_method_id');
            $table->string('code')->unique()->nullable();
            $table->string('fullname');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('address');
            $table->string('comment', 512)->nullable();
            $table->tinyInteger('shipping_method')->default(1);
            $table->integer('shipping_fee')->default(0);
            $table->tinyInteger('status')
                ->default(0)
                ->comment('status: (0: đã tạo đơn hàng và chưa thanh toán; 1: đã tạo đơn và đã thanh toán online; 2: (shipping) shipper đang đi giao hàng; 3: (cancel) đơn hàng bị hủy do lỗi kỹ thuật hoặc một lý do khác; 4: (finished) Hoàn thành)');
            $table->date('order_date');
            $table->timestamps();
            $table->softDeletes();

            // Set Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->index('o_user_id_fk');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->index('o_payment_method_id_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
