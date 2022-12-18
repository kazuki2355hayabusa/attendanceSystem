<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendace extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'job_start_time',
        'job_end_time',
        'created_at',
        'updated_at',
    ];
    public function Rest()
    {
        return $this->hasMany('App\Models\Rest');

    }

    

    
}
