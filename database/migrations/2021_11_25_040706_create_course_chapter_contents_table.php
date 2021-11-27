<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseChapterContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_chapter_contents', function (Blueprint $table) {
            $table->id();
            $table->uuid('_id');
            $table->string('title') ->nullable();
            $table->string('slug') ->nullable();
            $table->text('description') ->nullable();
            $table->string('original_filename');
            $table->string('filename');
            $table->string('mime');
            $table->string('url');
            $table->string('url_sm') ->nullable();
            $table->string('url_md') ->nullable();
            $table->string('url_lg') ->nullable();
            $table->boolean('is_mandatory') ->nullable();
            $table->boolean('is_open_for_free') ->nullable() ->default(1);
            $table->foreignId('course_chapter_id')->nullable()->constrained('course_chapters');
            $table->foreignId('content_type_id')->nullable()->constrained('content_types');
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
        Schema::dropIfExists('course_chapter_contents');
    }
}
