<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
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
            $table->uuid('_id');
            $table->string('title');
            $table->string('slug');
            $table->text('short_description') ->nullable();
            $table->longtext('description') ->nullable();
            $table->string('fee') ->nullable();
            $table->boolean('is_free') ->nullable();
            $table->foreignId('language_id')->nullable()->constrained('languages');
            $table->foreignId('level_id')->nullable()->constrained('levels');
            $table->foreignId('grouping_id')->nullable()->constrained('groupings');
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
        Schema::dropIfExists('courses');
    }
}
