<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'logo', 'image', 'clinic_name', 'slug',
        'clinic_address', 'description', 'gender',
        'dob', 'clinic_phone_no','professional_info', 'social_media', 'is_verified'];

    protected $casts = [
        'professional_info' => 'array',
        'social_media' => 'array',
    ];
    protected $appends = [
        'logo_url',
        'image_url'
    ];
    
	/* logo url */
	public function getLogoUrlAttribute(): string
    {
        return $this->logo ? asset('storage/doctor/profile/'.$this->logo)  : "";
    }
    public function getImageUrlAttribute(): string
    {
        return $this->logo ? asset('storage/doctor/profile/'.$this->image)  : "";
    }

    /**
     * Relationship: A doctor profile belongs to the doctor user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
