@extends('layouts.app')
@section('content')
    <p><br><br><h1>lijstjes</h1></P>
    @if(count($lijstjes) > 0)
        @foreach($lijstjes as $lijstje)
            <div class="card margin10">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h3><a href="/sinterklaas/public/lijst/{{$lijstje->id}}">{{$lijstje->title}}</a></h3>
                        <small>Written on {{$lijstje->created_at}} by {{$lijstje->user->name}}</small>
                    </div>
                    
                </div>
                
            
            </div>
            @if(!Auth::guest())

                @if(Auth::user()->id == $lijstje->user_id)
                    <a href="/sinterklaas/public/lijst/{{$lijstje->id}}/edit" class="btn btn-primary">Edit</a>

                    {!!Form::open(['action' => ['LijstjesController@destroy', $lijstje->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                @endif
            @endif
        @endforeach
    @else
        <p>No Lijstjes found</p>
    @endif
<script>
    $.getJSON('http://localhost/sinterklaas/public/lijst/sendJson', function(jsondata) {
        var obj = jQuery.parseJSON(data);
        console.log(obj);
    });
</script>
@endsection