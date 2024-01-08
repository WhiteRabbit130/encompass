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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            /* Teacher from users table */
            $table->unsignedBigInteger("teacher_id");

            /* Student from users table */
            $table->unsignedBigInteger("student_id");

            /* Parent from users table */
            $table->unsignedBigInteger("parent_id");

            /* Instrument from instruments table */
            $table->unsignedBigInteger("instrument_id");

            $table->double("price", 5, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
  
