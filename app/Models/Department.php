<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = [
        'depart_name'
    ];
    use HasFactory;
}
