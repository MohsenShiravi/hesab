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
        Schema::create('product_user', function (Blueprint $table) {
            $table->foreignId('product_id');
            $table->foreignId('user_id');
            $table->integer('purchase_price')->nullable();
            $table->integer('sales_price')->nullable();
            $table->boolean('is_active')->default(0);
            $table->integer('count_in_package')->nullable();
            $table->integer('minimum_stock')->default(0);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('product_user');
    }
};
