<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    public function messages()
    {
        return $this->morphMany(Message::class, 'messageable');
    }
}
