<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('transaction_id');
            $table->string('status');
            $table->string('amount');
            $table->string('registration_type')->nullable();
            $table->json('payment_response');
            $table->boolean('pickup_drop')->default(false);
            $table->boolean('airplane_booking')->default(false);
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
        Schema::dropIfExists('conference_payments');
    }
}
