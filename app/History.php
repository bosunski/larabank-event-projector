<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'message',
    ];

    protected $dates = [
        'created_at',
    ];
}
