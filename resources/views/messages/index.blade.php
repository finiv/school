@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <a style="margin: 19px;" href="{{ route('messages.create')}}" class="btn btn-primary">New message</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Message subject</th>
                <th>Message body</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->subject }}</td>
                <td>{{ $message->body }}</td>
                <td> <button class="btn btn-primary" type="submit">Send email</button>
                <a href="{{ route('messages.edit', ['message' => $message]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('messages.show', ['message' => $message]) }}" class="btn btn-primary">Show</a>
                <form action="{{ route('messages.destroy', ['message' => $message]) }}" method="post">
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" >Delete</button>
                            @csrf
                            </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop