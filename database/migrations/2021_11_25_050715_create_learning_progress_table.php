<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_progress', function (Blueprint $table) {
            $table->id();
            $table->uuid('_id');
            $table->string('status');
            $table->timestamp('begin_at')->nullable();
            $table->timestamp('completion_at')->nullable();
            $table->foreignId('course_chapter_content_id')->nullable()->constrained('course_chapter_contents');
            $table->foreignId('enrollment_id')->nullable()->constrained('enrollments');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_progress');
    }
}
