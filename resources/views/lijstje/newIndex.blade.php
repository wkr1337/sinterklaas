@extends('layouts.app')
@section('content')

<div class="addTable">

    
</div>
<script>
    // $.getJSON('http://localhost/sinterklaas/public/lijst/sendJson', function(jsondata) {
    //     var obj = jQuery.parseJSON(data);
    //     console.log(obj);
    // });

        
    function readyStateChanged() {
        alert(document.readyState);
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("addTable").innerHTML = this.responseText;
        } 
    }

    $.ajax({
        url: '/sinterklaas/public/postajax',
        dataType: 'JSON',
        success: function (data) { 
        // alert("hi");
        // alert(data.lijstjes[0]);

        $.each(data.lijstjes, function( key, value ) {
            // alert('key' + key);
            // alert('value' + value);

            if(jQuery.type(value) === "array") {
                var appendHtml = "";

                // alert("is arrayyyyy");
                $.each(value, function(item, item2) {

                    appendHtml += '<div class="card"><div class="row"><div class="col-md-4 col-sm-4">'; 
                    appendHtml += '<h3><a href="/sinterklaas/public/lijst/';
                    appendHtml += item2.id + '">' + item2.title + '</a></h3><small>Written on '
                    appendHtml += item2.created_at + ' by ' + 'unknown' + '</small>'

                    appendHtml += '</div></div></div>';
                });
            }
            $(".addTable").append(appendHtml);
            
            // alert(jQuery.type(value));


        });
        // for (var i = 0; i < data.lijstjes.length; ++i) {
        //     alert(data.lijstjes[i]);
        // }
        $(".addTable").append(data.msg); 
        $(".addTable").append(data.body); 
        $(".addTable").append(data.status);
        $(".addTable").append(data.lijstjes);
        
        }
    })
</script>

@endsection