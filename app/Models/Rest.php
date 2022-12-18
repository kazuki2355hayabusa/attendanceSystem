<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;
    protected $fillable = [
        'attendace_id',
        'break_start_time',
        'break_end_time',
        'created_at',
        'updated_at',
    ];

}
