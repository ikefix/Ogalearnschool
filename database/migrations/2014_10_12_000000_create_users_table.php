<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');

    // New fields
    $table->enum('role', ['student', 'school', 'admin', 'super_admin'])->default('student');
    $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Remove ->after()
    $table->string('school_name')->nullable();
    $table->string('address')->nullable();
    $table->string('phone_number')->nullable();
    $table->string('profile_photo')->nullable();
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->unsignedBigInteger('school_id')->nullable();
    $table->timestamp('last_login_at')->nullable();
    $table->boolean('is_verified')->default(false);

    $table->rememberToken();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
