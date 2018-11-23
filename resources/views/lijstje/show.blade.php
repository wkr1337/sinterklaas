@extends('layouts.app')
@section('content')
    <a href="/sinterklaas/public/lijst" class="btn btn-primary">Go back</a>
    <h1>{{$lijstje->title}}</h1>
    <br><br>
    <div>
        {!!$lijstje->body!!}
    </div>
    <hr>
    <small>Written on {{$lijstje->created_at}} by {{$lijstje->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $lijstje->user_id)
            <a href="/sinterklaas/public/lijst/{{$lijstje->id}}/edit" class="btn btn-primary">Edit</a>

            {!!Form::open(['action' => ['LijstjesController@destroy', $lijstje->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection