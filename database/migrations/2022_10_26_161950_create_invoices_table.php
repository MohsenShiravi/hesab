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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_entry_exit_id');
            $table->foreignId('vendor_id')->constrained('users','id');;
            $table->foreignId('buyer_id')->constrained('users','id');;
            $table->text('personal_note')->nullable();
            $table->text('description')->nullable();
            $table->enum('status',['pending','unpaid','paid'])->default('unpaid');
            $table->integer('total_amount')->default('0');
            $table->string('post_barcode')->nullable();
            $table->integer('post_price')->default('0');
            $table->integer('total_shipping')->default('0');
            $table->integer('total_tax')->default('0');
            $table->integer('how_much_paid')->default('0');
            $table->timestamp('shipped_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->integer('discount_id')->nullable();
            $table->integer('discount_amount')->default('0');
            $table->timestamp('send_confirmed_at')->nullable();
            $table->timestamp('receive_confirmed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
