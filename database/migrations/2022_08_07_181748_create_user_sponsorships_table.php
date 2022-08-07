<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSponsorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sponsorships', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sponsorship_id');
            $table->integer('payment_id')->nullable();
            $table->boolean('is_active')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_sponsorships');
    }
}
