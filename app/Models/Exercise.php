<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'reps',
        'hold',
        'complete',
        'perform',
        'frequency',
        'times',
        'is_active',
        'is_private',
        'created_by'
    ];

    protected $appends = [
        'image_url',
    ];
	/* image url */
	public function getImageUrlAttribute(): string
    {
        return $this->image ? asset('storage/exercise/'.$this->image)  : "";
    }
    public function exercise_category()
    {
        return $this->hasMany('App\Models\ExerciseCategory', 'exercise_id');
    }
    /**
     * Relationship: An exercise is created by a user.
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
    /**
     * Relationship: An exercise have attachments.
     */
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachable');
    }
}
