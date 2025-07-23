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
        Schema::create('courses', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('school_id'); // School that owns the course
    $table->unsignedBigInteger('author_id'); // User that created the course

    $table->string('title');
    
    // Learning sections
    $table->text('what_youll_learn')->nullable();
    $table->text('course_outcomes')->nullable(); // At the end of the course
    $table->text('course_questions')->nullable(); // Optional quiz or reflection questions

    // Core content
    $table->string('slug')->unique(); // SEO URL
    $table->text('description')->nullable(); // Short meta/summary
    $table->string('thumbnail')->nullable(); // Course cover image
    $table->longText('content')->nullable(); // Rich course body: CKEditor-based

    // Social metrics
    $table->unsignedBigInteger('views')->default(0);
    $table->unsignedBigInteger('likes')->default(0);
    
    // Comment system — ⚠️ Will be implemented separately in a new table (not in this one)

    $table->enum('status', ['draft', 'published'])->default('draft');

    $table->timestamps();

    // Foreign key constraints
    $table->foreign('school_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
