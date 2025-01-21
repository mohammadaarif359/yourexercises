<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'category_id',
        'subcategory_id',
        'exercise_id',
        'reps',
        'hold',
        'complete',
        'perform',
        'frequency',
        'times',
        'created_by',
    ];

    /**
     * Relationship: A plan detail belongs to a plan.
     */
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    /**
     * Relationship: A plan detail belongs to an exercise.
     */
    public function exercise()
    {
        return $this->belongsTo('App\Models\Exercise');
    }
}
