<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'subject',
        'body',
        'send'
    ];

    public function students()
    {
        return $this->morphedByMany(Student::class, 'messageable');
    }

    public function teachers()
    {
        return $this->morphedByMany(Teacher::class, 'messageable');
    }
}
