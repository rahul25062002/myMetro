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
        Schema::create('metro_details', function (Blueprint $table) {
            $table->id();
            $table->string('metroname');
            $table->integer('metrocode');
            $table->string('metroline');
            $table->integer('metrocouch');
            $table->string('stp');
            $table->string('enp');
            $table->time('starttime');
            $table->time('endtime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metro_details');
    }
};
