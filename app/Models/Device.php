<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    protected $table = 'devices';

    use SoftDeletes;

    protected $fillable = [
        'name', 'machine_code', 'price', 'status', 'brand'
    ];
}
