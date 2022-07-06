<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorshipPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorship_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sponsorship_id');
            $table->string('transaction_id');
            $table->string('status');
            $table->string('amount');
            $table->json('payment_response');
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
        Schema::dropIfExists('sponsorship_payments');
    }
}
