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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('promotion_id')->nullable();
            $table->string('name', 200)->unique();
            $table->string('slug')->unique()->nullable();
            $table->string('code', 20)->unique()->nullable();
            $table->longText('content')->nullable();
            $table->string('thumbnail');
            $table->boolean('status')->default(1);
            $table->integer('quantity')->default(0);
            $table->double('price', 16, 2);
            $table->boolean('is_feature')->default(0);
            $table->timestamps();
            $table->softDeletes();

            // Set Foreign Key
            $table->foreign('category_id')->references('id')->on('categories')->index('p_category_id_fk');
            $table->foreign('promotion_id')->references('id')->on('promotions')->index('p_promotion_id_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
