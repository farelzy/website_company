<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $guarded = [];
    protected $casts = ['features' => 'array'];
}
