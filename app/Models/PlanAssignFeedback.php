<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanAssignFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_id', 'plan_id', 'exercise_id', 'rating', 'comment', 'answer'];

    protected $table = 'plan_assign_feedbacks';  

    protected $casts = [
        'answer' => 'array'
    ];
    
	/**
     * Relationship: A feedback belongs to the assigned plan.
     */
    public function assign_plan()
    {
        return $this->belongsTo('App\Models\DoctorPlanAssign', 'assign_id');
    }
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
     * Relationship: A plan assign belongs to the exercise.
     */
    public function exercise()
    {
        return $this->belongsTo('App\Models\DoctorExercise', 'exercise_id');
    }
}
