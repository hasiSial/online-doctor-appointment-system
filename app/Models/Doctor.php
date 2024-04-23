<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'depart_id',
        'specialist',
        'fee',
        'clinic_address',
        'about',
        'experience',
        'slug',
        'most_views',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dayTime()
    {
        return $this->hasMany(DayTimes::class,'doc_id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class , 'doc_id');
    }
}
