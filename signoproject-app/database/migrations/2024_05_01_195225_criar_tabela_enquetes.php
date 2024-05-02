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
        Schema::create('enquetes', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('vote1');
            $table->string('vote2');
            $table->string('vote3');
            $table->string('qtd_vote1');
            $table->string('qtd_vote2');
            $table->string('qtd_vote3');
            $table->date('date');
            $table->time('hour_start');
            $table->time('hour_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
