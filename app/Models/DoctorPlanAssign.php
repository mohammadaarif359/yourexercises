<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPlanAssign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'doctor_user_id', 'doctor_id', 'plan_id', 'exercise_count','status','avg_rating', 'completed_at'];
    
	/**
     * Relationship: A plan assign belongs to the doctor plan.
     */
    public function plan()
    {
        return $this->belongsTo('App\Models\DoctorPlan', 'plan_id');
    }
    /**
     * Relationship: A plan assign belongs to the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    /**
     * Relationship: A plan assign belongs to the doctor user.
     */
    public function doctor_user()
    {
        return $this->belongsTo('App\Models\User', 'doctor_user_id');
    }
    /**
     * Relationship: A plan assign belongs to the doctor profile.
     */
    public function doctor()
    {
        return $this->belongsTo('App\Models\DoctorProfile', 'doctor_id');
    }
    public function feedback()
    {
        return $this->hasMany('App\Models\PlanAssignFeedback', 'assign_id', 'id');
    }
}
