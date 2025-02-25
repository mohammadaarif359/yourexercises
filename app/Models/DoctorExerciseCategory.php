<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorExerciseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_exercise_id',
        'category_id',
        'subcategory_id',
    ];

    /**
     * Relationship: An exercise belongs to a category.
     */
    public function exercise()
    {
        return $this->belongsTo('App\Models\DoctorExercise');
    }

    /**
     * Relationship: An exercise belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    /**
     * Relationship: An exercise belongs to a subcategory.
     */
    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
}
