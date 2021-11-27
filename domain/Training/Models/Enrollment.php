<?php

namespace Domain\Training\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mawuekom\ModelUuid\Utils\GeneratesUuid;
use Mawuekom\Usercare\Traits\Slugable;

class Enrollment extends Model
{
    use Slugable, GeneratesUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'enrollments';

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
        'is_paid', 'is_paid_at', 'user_id', 'course_id', 
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
        'is_paid'           => 'string',
        'is_paid_at'        => 'datetime',
        'user_id'           => 'integer',
        'course_id'         => 'integer',
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
     * Enrollment belongs to course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this ->belongsTo(Course::class, 'course_id', 'id');
    }

    /**
     * Enrollment belongs to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this ->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Course chapter has many contents
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'enrollment_id', 'id');
    }

    /**
     * Get course's chapters count
     *
     * @return int
     */
    public function getFeedbacksCountAttribute(): int
    {
        return $this ->feedbacks() ->count();
    }

    /**
     * Enrollment has many learning progress
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function learningProgress(): HasMany
    {
        return $this->hasMany(LearningProgress::class, 'enrollment_id', 'id');
    }

    /**
     * Get enrollment's learning progress count
     *
     * @return int
     */
    public function getLearningProgressCountAttribute(): int
    {
        return $this ->learningProgress() ->count();
    }
}
