<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'is_active', 'created_by'];

    protected $appends = [
        'image_url',
    ];
	/* image url */
	public function getImageUrlAttribute(): string
    {
        return $this->image ? asset('storage/plan/'.$this->image)  : "";
    }
    /**
     * Relationship: A plan may have many details.
     */
    public function plan_detail()
    {
        return $this->hasMany('App\Models\PlanDetail');
    }

    /**
     * Relationship: A plan belongs to the user who created it.
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
