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
    Schema::create('live_classes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('course_id')->constrained()->onDelete('cascade');
        $table->foreignId('school_id')->constrained('users')->onDelete('cascade');
        $table->string('meeting_name');
        $table->string('status')->default('active'); // or "ended"
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
        Schema::dropIfExists('live_classes');
    }
};
