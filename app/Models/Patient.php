<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'patient_name',
        'patient_age',
    ];

    public function appointment()
    {
        return $this->hasMany(Appointment::class,'patient_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
