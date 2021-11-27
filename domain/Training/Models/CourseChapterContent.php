<?php

namespace Domain\Training\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mawuekom\ModelUuid\Utils\GeneratesUuid;
use Mawuekom\Usercare\Traits\Slugable;

class CourseChapterContent extends Model
{
    use Slugable, GeneratesUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_chapter_contents';

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
        'original_filename', 'filename', 'mime', 
        'url', 'url_sm', 'url_md', 'url_lg', 
        'is_mandatory', 'is_open_for_free',
        'course_chapter_id', 'content_type_id',
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
        'original_filename' => 'string',
        'filename'          => 'string',
        'mime'              => 'string',
        'url'               => 'string',
        'url_sm'            => 'string',
        'url_md'            => 'string',
        'url_lg'            => 'string',
        'is_mandatory'      => 'string',
        'is_open_for_free'  => 'string',
        'course_chapter_id' => 'integer',
        'content_type_id'   => 'integer',
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
     * Chapter content belongs to course's chapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseChapter(): BelongsTo
    {
        return $this ->belongsTo(CourseChapter::class, 'course_chapter_id', 'id');
    }

    /**
     * Chapter content belongs to content type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contentType(): BelongsTo
    {
        return $this ->belongsTo(ContentType::class, 'content_type_id', 'id');
    }

    /**
     * Course chapter content has many learning progress
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function learningProgress(): HasMany
    {
        return $this ->hasMany(LearningProgress::class, 'course_chapter_content_id', 'id');
    }

    /**
     * Get course chapter content's learning progress count.
     *
     * @return int
     */
    public function getLearningProgressCountAttribute(): int
    {
        return $this ->learningProgress() ->count();
    }
}
