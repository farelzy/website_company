<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'bus_type',
        'destination',
        'departure_date',
        'message',
    ];
}
