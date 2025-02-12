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
        Schema::create('user', function (Blueprint $table) {
            $table->increments("user_id");
            $table->string("user_name", 255);
            $table->string("email", 255)->unique();
            $table->string("password", 255);
            $table->enum('user_role', ['Teacher', 'Student', 'Manager']);
            $table->dateTime('user_create_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
