<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAccompanyingPersons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accompanying_persons', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title', 10)->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('fees', 20)->default(0);
            $table->boolean('confirmed')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('table_accompanying_persons');
    }
}
