<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_charges', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->string('event');
            $table->string('category'); // UG / Nurse, PG / MSc / PhD, Delegate
            $table->integer('delegate_type_id'); // INDIAN, SAARC, INTERNATIONAL
            $table->integer('registration_period_id'); // Early Bird, Standard, Late, Spot
            $table->integer('amount'); // The amount for that specific type
            $table->integer('discount')->default(0);
            $table->string('currency'); // INR, USD
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
        Schema::dropIfExists('registration_charges');
    }
}
