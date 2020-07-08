<div class="container">
    @if(Session::has('success'))
        <p class="alert alert-default-success col-md-4 container text-center">{{Session::get('success')}}</p>
    @elseif(Session::has('failed'))
        <p class="alert alert-default-danger col-md-4 container text-center">{{Session::get('failed')}}</p>
    @endif
</div>
