<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'image', 'is_active', 'created_by'];

    protected $appends = [
        'image_url',
    ];
	/* image url */
	public function getImageUrlAttribute(): string
    {
        return $this->image ? asset('storage/category/'.$this->image)  : "";
    }
    /**
     * Relationship: A category may have multiple subcategories.
     */
    public function subcategory()
    {
        return $this->hasMany('App\Models\Category');
    }

    /**
     * Relationship: A category may have exercises.
     */
    public function category_exercise()
    {
        return $this->hasMany('App\Models\Exercise');
    }
}
