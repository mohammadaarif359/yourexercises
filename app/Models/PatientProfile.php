<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'doctor_id', 'gender', 'dob', 'address','medical_history','medical_details_including_soap', 'avg_rating'];
    
	
    /**
     * Relationship: A doctor profile belongs to the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    /**
     * Relationship: A patient profile belongs to the doctor.
     */
    public function patient_doctor()
    {
        return $this->belongsTo('App\Models\DoctorProfile', 'doctor_id');
    }
}
