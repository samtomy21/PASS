<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('passes', function (Blueprint $table) {
            $table->id();
 

            $table->unsignedBigInteger('user_id');

            $table->string('motive');
            $table->string('place');
            $table->string('observation');
            $table->smallInteger('estado')->defaault(0);
            $table->unsignedBigInteger('time_id');
            $table->time('input');
            $table->time('output');
            $table->dateTimeTz('date');

            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('time_id')->references('id')->on('times');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passes');
    }
};
