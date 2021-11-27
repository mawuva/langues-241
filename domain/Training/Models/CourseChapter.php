<?php

namespace Domain\Training\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mawuekom\ModelUuid\Utils\GeneratesUuid;
use Mawuekom\Usercare\Traits\Slugable;

class CourseChapter extends Model
{
    use Slugable, GeneratesUuid, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_chapters';

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
        'title', 'slug', 'description', 
        'course_id', 'level_id',
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
        'id'                => 'integer',
        '_id'               => 'string',
        'title'             => 'string',
        'slug'              => 'string',
        'description'       => 'string',
        'course_id'         => 'integer',
        'level_id'          => 'integer',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
        'deleted_at'        => 'datetime',
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
     * Course chapter belongs to course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this ->belongsTo(Course::class, 'course_id', 'id');
    }

    /**
     * Course chapter belongs to level
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level(): BelongsTo
    {
        return $this ->belongsTo(Level::class, 'level_id', 'id');
    }

    /**
     * Course chapter has many contents
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseChapterContents(): HasMany
    {
        return $this->hasMany(CourseChapterContent::class, 'course_chapter_id', 'id');
    }

    /**
     * Get course's chapters count
     *
     * @return int
     */
    public function getCourseChapterContentsCountAttribute(): int
    {
        return $this ->courseChapterContents() ->count();
    }
}
