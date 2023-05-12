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
 
            $table->unsignedBigInteger('dependence_id');
            $table->unsignedBigInteger('charge_id');
            $table->unsignedBigInteger('user_id');

            $table->string('motive');
            $table->string('place');
            $table->string('observation');
            $table->smallInteger('estado')->defaault(0);
            $table->time('time');
            $table->time('input');
            $table->time('output');
            $table->dateTimeTz('date');

            $table->timestamps();

            $table->foreign('dependence_id')->references('id')->on('dependences');
            $table->foreign('charge_id')->references('id')->on('charges');
            $table->foreign('user_id')->references('id')->on('users');
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
