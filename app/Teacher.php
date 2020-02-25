<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    public function messages()
    {
        return $this->morphToMany(Message::class, 'messageable');
    }
}
