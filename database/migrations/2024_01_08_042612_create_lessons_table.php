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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            /* Teacher from users table */
            $table->unsignedBigInteger("teacher_id");

            /* Student from users table */
            $table->unsignedBigInteger("student_id");

            /* Parent from users table */
            $table->unsignedBigInteger("parent_id");

            /* Instrument from instruments table */
            $table->unsignedBigInteger("instrument_id");

            $table->double("price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
  
