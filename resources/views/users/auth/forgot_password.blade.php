@extends('layouts.users.master_layout')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mb-4">{{trans('messages.forgot_password')}}</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">
                @if($errors->any())
                    <div class="alert alert-danger text-center" role="alert">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <p class="login-box-msg">{{trans('messages.forgot_password_message')}}</p>
                <form action="{{route('forgot_password')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="email" class="float-right">Email: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="email" class="form-control" name="email" autofocus>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit float-right btn btn-success">{{trans('messages.send')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
