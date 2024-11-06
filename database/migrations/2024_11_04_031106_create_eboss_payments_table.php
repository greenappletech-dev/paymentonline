<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbossPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eboss_payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_no')->nullable();
            $table->string('tax_payer_id');
            $table->string('full_name');
            $table->string('appl_code');
            $table->bigInteger('biz_id');
            $table->string('biz_name');
            $table->decimal('amount', 13,2);
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('payment_status')->nullable();
            $table->date('transact_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('references')->nullable();
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
        Schema::dropIfExists('eboss_payments');
    }
}
