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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Register
            $table->string('firstName');
            $table->string('lastName')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');

            // Profile
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            // Address
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('post_code')->nullable();


            $table->foreignId('role_id')->default('1');
            $table->enum('status', ['active', 'banned'])->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
