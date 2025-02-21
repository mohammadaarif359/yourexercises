<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoInquiry extends Model
{
    use HasFactory;
	protected $fillable = [
        'name',
        'email',
		'phone',
        'preferred_time',
        'designation',
        'clinic_name',
        'city'
    ];
}
