<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use SoftDeletes;

    protected $casts = [
        'address' => 'object'
    ];
    protected $table = 'candidates';

    protected $fillable = [
        'email', 'name', 'address', 'gender', 'apply_way', 'cv', 'phone', 'worker_type'
    ];
}
