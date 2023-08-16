<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'answer_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function question()
    {
        return $this->hasOne(question::class);
    }

    // Relación uno a muchos con Answer
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
