<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPlan extends Model
{
    use HasFactory;

    protected $fillable = ['plan_id', 'name', 'description', 'image', 'is_active', 'created_by'];

    protected $appends = [
        'image_url',
    ];
	/* image url */
	public function getImageUrlAttribute(): string
    {
        return $this->image ? asset('storage/doctor/plan/'.$this->image)  : "";
    }

    /**
     * Relationship: A doctor plan belongs to a admin plan.
     */
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    /**
     * Relationship: A doctor plan may have many details.
     */
    public function doctor_plan_detail()
    {
        return $this->hasMany('App\Models\DoctorPlanDetail');
    }

    /**
     * Relationship: A doctor plan is created by a user (doctor).
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
