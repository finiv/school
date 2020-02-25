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
                <form method="post" action="{{ route('messages.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="type">Subject:</label>
                        <input type="text" class="form-control" name="subject"/>
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea type="text" class="form-control" name="body"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Teachers</label>
                        <select name="teachers[]" multiple size="2" class="form-control">
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" class="form-control">{{ $teacher->first_name . $teacher->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Students</label>
                        <select name="students[]" multiple size="2" class="form-control">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" class="form-control">{{ $student->first_name . $student->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add message</button>
                </form>
            </div>
        </div>
    </div>
@endsection