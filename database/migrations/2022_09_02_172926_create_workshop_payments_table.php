<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('workshop_id')->nullable();
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
        Schema::dropIfExists('workshop_payments');
    }
}
