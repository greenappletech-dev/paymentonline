<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->biginteger('account_number');
            $table->string('client_name',50);
            $table->string('phone_number',50);
            $table->integer('location');
            $table->string('email',100);
            $table->biginteger('amount');
            $table->integer('payment_type');
            $table->string('payment_status',50);
            $table->string('request_id',50)->nullable();
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
        Schema::dropIfExists('payment_details');
    }
}
