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
        Schema::create('enrollment', function (Blueprint $table) {
            $table->increments('enrollment_id');
            $table->unsignedInteger('training_id');
            $table->unsignedInteger('user_id');
            $table->enum('enrollment_status', ['Enrolled', 'Present', 'Not Present']);
            $table->dateTime('enrollment_date')->useCurrent();

            $table->foreign('training_id')->references('training_id')->on('training');
            $table->foreign('user_id')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment');
    }
};
