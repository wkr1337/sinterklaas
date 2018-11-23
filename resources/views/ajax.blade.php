@extends('layouts.app')
@section('content')
<script>
    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(".postbutton").click(function(){
            $.ajax({
                /* the route pointing to the post function */
                url: '/sinterklaas/public/postajax',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), title:$("#title").val(), body:$("#body").val()},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) { 
                    $(".writeinfo").append(data.msg); 
                    $(".writeinfo").append(data.body); 
                }
            }); 
        });
   });    
</script>


<input class="getinfo"></input>
<button class="postbutton">Post via ajax!</button>
<div class="writeinfo"></div>   

@endsection