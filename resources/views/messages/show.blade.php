@extends('adminlte::page')

@section('title', 'Messages')

@section('content_header')
    <h1>Add new Transaction</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <a href="{{ url('messages') }}" class="btn btn-primary">Back</a>
                    <div class="form-group">
                        <label for="type">Subject:</label>
                        <input type="text" class="form-control" name="subject" value="{{ $message->subject }}" readonly="readonly"/>
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea type="text" class="form-control" name="body" readonly="readonly">{{ $message->body }}</textarea>
                    </div>
                    @if(count($message->teachers) > 0)
                    <div class="form-group">
                        <label for="title">Teachers</label>
                        @foreach($message->teachers as $item)
                        <textarea name="teachers[]" id="" cols="30" rows="10" class="form-control" readonly="readonly">{{ $item->first_name . ' ' . $item->last_name }}</textarea>
                        @endforeach
                    </div>
                    @endif
                    @if(count($message->students) > 0)
                    <div class="form-group">
                        <label for="title">Students</label>
                        @foreach($message->students as $item)
                        <textarea name="teachers[]" id="" cols="30" rows="10" class="form-control" readonly="readonly">{{ $item->first_name . ' ' . $item->last_name }}</textarea>
                        @endforeach
                    </div>
                    @endif
                    
                
            </div>
        </div>
    </div>
@endsection