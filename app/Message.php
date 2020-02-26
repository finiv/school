<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use Notifiable;

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
