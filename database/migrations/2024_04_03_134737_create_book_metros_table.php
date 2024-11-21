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
        Schema::create('book_metros', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobilenumber');
            $table->string('purpose');
            $table->date('date');
            $table->string('days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_metros');
    }
};
