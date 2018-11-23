@extends('layouts.app')

@section('content')
<div class="container">

    {!! Form::open(['action' => 'LijstjesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'submitButton'])}}
    {!! Form::close() !!}

</div>


<script>

    



//     $(document).ready(function(){
//         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//         $("#submitButton").click(function(){
//             $.ajax({
//                 /* the route pointing to the post function */
//                 url: '/sinterklaas/public/lijst/store',
//                 type: 'POST',
//                 /* send the csrf-token and the input to the controller */
//                 data: {_token: CSRF_TOKEN, title:$("#title").val(), body:$("#body").val()},
//                 dataType: 'JSON',
//                 /* remind that 'data' is the response of the AjaxController */
//                 success: function (data) { 
//                     $(".writeinfo").append(data.msg); 
//                     $(".writeinfo").append(data.body); 
//                 }
//             }); 
//         });
//    });    
</script>


@endsection