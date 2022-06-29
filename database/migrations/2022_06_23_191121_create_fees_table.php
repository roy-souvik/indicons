<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->string('event');
            $table->string('currency', 10);
            $table->string('early_bird_amount', 20)->nullable();
            $table->string('early_bird_member_discount', 20)->default(0);
            $table->string('standard_amount', 20)->nullable();
            $table->string('standard_member_discount', 20)->default(0);
            $table->string('spot_amount', 20)->nullable();
            $table->string('spot_member_discount', 20)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}
