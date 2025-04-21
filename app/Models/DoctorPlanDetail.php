<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPlanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_plan_id',
        'plan_detail_id',
        'category_id',
        'subcategory_id',
        'doctor_exercise_id',
        'reps',
        'hold',
        'complete',
        'perform',
        'frequency',
        'times',
        'created_by'
    ];

    /**
     * Relationship: A doctor plan detail belongs to a doctor plan.
     */
    public function doctor_plan()
    {
        return $this->belongsTo('App\Models\DoctorPlan');
    }

    /**
     * Relationship: A doctor plan detail belongs to an exercise.
     */
    public function exercise()
    {
        return $this->belongsTo('App\Models\DoctorExercise','doctor_exercise_id', 'id');
    }
    /**
     * Relationship: A doctor plan detail belongs to an category.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    /**
     * Relationship: A doctor plan detail belongs to an category.
     */
    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
}
