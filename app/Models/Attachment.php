<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'path',
        'attachable_id',
        'attachable_type',
        'created_by',
        'is_active'
    ];

    protected $appends = [
        'image_url',
    ];
	/* image url */
	public function getImageUrlAttribute(): string
    {
        return $this->image ? asset('storage/'.$this->path.'/'.$this->image)  : "";
    }

    /**
     * Define the polymorphic relationship.
     */
    public function attachable()
    {
        return $this->morphTo();
    }

    /**
     * Relationship: A plan belongs to the user who created it.
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
