<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserScore extends Model
{
    protected $fillable = [
        'user_id',
        'score'
    ];

}
