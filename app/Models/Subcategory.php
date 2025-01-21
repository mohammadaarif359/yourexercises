<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'slug', 'description', 'image', 'is_active','created_by'];

    protected $appends = [
        'image_url',
    ];
	/* image url */
	public function getImageUrlAttribute(): string
    {
        return $this->image ? asset('storage/subcategory/'.$this->image)  : "";
    }
    /**
     * Relationship: A subcategory belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Relationship: A subcategory may have multiple exercises.
     */
    public function subcategory_exercise()
    {
        return $this->hasMany('App\Models\Exercise');
    }
}
