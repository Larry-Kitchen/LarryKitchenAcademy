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
        Schema::create('training', function (Blueprint $table) {
            $table->increments('training_id');
            $table->string('training_name', 255);
            $table->text('training_desc');
            $table->integer('training_capacity');
            $table->string('training_classroom', 255);
            $table->enum('training_status', ['Pending', 'Open', 'Done']);
            $table->unsignedInteger("training_teacher_id");
            $table->dateTime('training_date');
            $table->dateTime('training_create_date');


            $table->foreign('training_teacher_id')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training');
    }
};
