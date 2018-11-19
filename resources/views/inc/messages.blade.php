{{-- check for session succes --}}
@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif
{{-- check for session error --}}
@if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
@endif