<?php

namespace Domain\Training\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mawuekom\ModelUuid\Utils\GeneratesUuid;
use Mawuekom\Usercare\Traits\Slugable;

class Course extends Model
{
    use Slugable, GeneratesUuid, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

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
        'title', 'slug', 'short_description', 'description', 'fee', 'is_free',
        'language_id', 'level_id', 'grouping_id'
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
        'short_description' => 'string',
        'description'       => 'string',
        'fee'               => 'string',
        'is_free'           => 'string',
        'language_id'       => 'integer',
        'level_id'          => 'integer',
        'grouping_id'       => 'integer',
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
     * Get the course's image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
    /**
     * Course belongs to language
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this ->belongsTo(Language::class, 'language_id', 'id');
    }

    /**
     * Course belongs to level
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level(): BelongsTo
    {
        return $this ->belongsTo(Level::class, 'level_id', 'id');
    }

    /**
     * Course belongs to grouping
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grouping(): BelongsTo
    {
        return $this ->belongsTo(Grouping::class, 'grouping_id', 'id');
    }

    /**
     * Course has many chapters
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseChapters(): HasMany
    {
        return $this->hasMany(CourseChapter::class, 'course_id', 'id');
    }

    /**
     * Get course's chapters count
     *
     * @return int
     */
    public function getCourseChaptersCountAttribute(): int
    {
        return $this ->courseChapters() ->count();
    }

    /**
     * Course has many enrollments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'course_id', 'id');
    }

    /**
     * Get course's enrollments count
     *
     * @return int
     */
    public function getEnrollmentsCountAttribute(): int
    {
        return $this ->enrollments() ->count();
    }
}
