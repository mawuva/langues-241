<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mawuekom\ModelUuid\Utils\GeneratesUuid;

class Image extends Model
{
    use HasFactory, GeneratesUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

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
        'original_filename', 'filename', 'mime', 
        'url', 'url_sm', 'url_md', 'url_lg', 
        'imageable_id', 'imageable_type'
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
        'original_filename' => 'string',
        'filename'          => 'string',
        'mime'              => 'string',
        'url'               => 'string',
        'url_sm'            => 'string',
        'url_md'            => 'string',
        'url_lg'            => 'string',
        'imageable_id'      => 'integer',
        'imageable_type'    => 'string',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
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
     * Get the model that the image belongs to.
     */
    public function imageable()
    {
        return $this->morphTo(__FUNCTION__, 'imageable_type', 'imageable_id');
    }
}
