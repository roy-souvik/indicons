<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWorkshopsAndPaymentsTablesSupportMultiple extends Migration
{
    public function up()
    {
        // 1. Add venue to workshops
        Schema::table('workshops', function (Blueprint $table) {
            $table->string('venue')->nullable()->after('description');
        });

        // 2. Remove workshop_id from workshop_payments
        Schema::table('workshop_payments', function (Blueprint $table) {
            $table->dropColumn('workshop_id');
        });

        // 3. Add payment_id to workshop_users
        Schema::table('workshop_users', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 1. Drop venue
        Schema::table('workshops', function (Blueprint $table) {
            $table->dropColumn('venue');
        });

        // 2. Add workshop_id back
        Schema::table('workshop_payments', function (Blueprint $table) {
            $table->integer('workshop_id')->nullable();
        });

        // 3. Drop payment_id
        Schema::table('workshop_users', function (Blueprint $table) {
            $table->dropColumn('payment_id');
        });
    }
}
