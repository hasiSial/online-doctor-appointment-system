<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_id',
        'patient_id',
        'appointment_date',
        'appointment_time',
        'status',
        'reason'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doc_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
}
