<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTxnIdToAccompanyingPersonsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accompanying_persons', function (Blueprint $table) {
            $table->string('transaction_id')->after('fees')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accompanying_persons', function (Blueprint $table) {
            $table->dropColumn('transaction_id');
        });
    }
}
