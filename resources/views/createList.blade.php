@extends('layouts.app')

@section('content')
<div class="container">

        {!! Form::open(['action' => ['LijstjesController@store', 1], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::textarea('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}

</div>


@endsection