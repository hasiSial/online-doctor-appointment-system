<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTimes extends Model
{
    protected $fillable = [
        'doc_id',
        'day',
        'start_time',
        'end_time',
        'duration',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
    use HasFactory;
}
