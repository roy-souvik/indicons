<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbstractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abstracts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('image')->nullable();
            $table->string('heading');
            $table->string('theme');
            $table->string('co_author')->nullable();
            $table->text('description');
            $table->text('statements')->nullable();

            $table->string('qualification');
            $table->string('profession');
            $table->string('institution');
            $table->string('alternate_number');
            $table->boolean('confirmed')->default(false);

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
        Schema::dropIfExists('abstracts');
    }
}
