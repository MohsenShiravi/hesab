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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payee_id')->constrained('users','id');
            $table->foreignId('payer_id')->constrained('users','id');
            $table->integer('amount')->default(0);
            $table->integer('used_amount')->nullable();
            $table->string('transaction_name')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('tracking_code')->nullable();
            $table->timestamp('done_at')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
