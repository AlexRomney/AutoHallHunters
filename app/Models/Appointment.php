<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [
        'id',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
