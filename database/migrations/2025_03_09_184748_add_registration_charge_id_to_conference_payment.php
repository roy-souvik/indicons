<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegistrationChargeIdToConferencePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conference_payments', function (Blueprint $table) {
            $table->integer('registration_charge_id')
                ->nullable()
                ->after('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conference_payments', function (Blueprint $table) {
            $table->dropColumn('registration_charge_id');
        });
    }
}
