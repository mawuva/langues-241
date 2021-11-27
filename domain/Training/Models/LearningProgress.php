<?php

namespace Domain\Training\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mawuekom\ModelUuid\Utils\GeneratesUuid;
use Mawuekom\Usercare\Traits\Slugable;

class LearningProgress extends Model
{
    use Slugable, GeneratesUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'learning_progress';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'begin_at', 'completion_at', 
        'course_chapter_content_id', 'enrollment_id'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                        => 'integer',
        '_id'                       => 'string',
        'status'                    => 'string',
        'begin_at'                  => 'datetime',
        'completion_at'             => 'datetime',
        'course_chapter_content_id' => 'integer',
        'enrollment_id'             => 'integer',
        'created_at'                => 'datetime',
        'updated_at'                => 'datetime',
        'deleted_at'                => 'datetime',
    ];

    /**
     * The names of the columns that should be used for the UUID.
     *
     * @return array
     */
    public function uuidColumns(): array
    {
        return ['_id'];
    }

    /**
     * Learning progress belongs to chapter content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseChapterContent(): BelongsTo
    {
        return $this ->belongsTo(CourseChapterContent::class, 'course_chapter_content_id', 'id');
    }

    /**
     * Learning progress belongs to enrollment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enrollment(): BelongsTo
    {
        return $this ->belongsTo(Enrollment::class, 'enrollment_id', 'id');
    }
}
