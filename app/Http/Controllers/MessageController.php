<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Message, Teacher, Student};
use App\Jobs\EmailSend;
use Illuminate\Support\Facades\Redis;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        
        return view('messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        
        return view('messages.create', compact('teachers', 'students'));
    }

    public function edit(Message $message)
    {
        $teachers = Teacher::all();
        $students = Student::all();
        
        return view('messages.edit', compact('message', 'teachers', 'students'));
    }

    public function store (Request $request)
    {        
        $message = Message::create($request->all());

        $message->students()->sync($request->students);
        $message->teachers()->sync($request->teachers);

        return redirect('/messages')->with('success', 'Message successfuly created');
    }

    public function update (Request $request, Message $message)
    {        
        $message->update($request->all());

        $message->students()->sync($request->students);
        $message->teachers()->sync($request->teachers);

        return redirect('/messages')->with('success', 'Message successfuly created');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        
        return redirect()->route('messages.index')
                        ->with('success','Message was deleted successfully');
    }

    public function sendEmails (Message $message)
    {
        EmailSend::dispatch($message);
        
        return back()->with('success', 'Message successfuly send');
    }
}
