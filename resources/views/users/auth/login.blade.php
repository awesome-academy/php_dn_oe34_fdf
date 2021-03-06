@extends('layouts.users.master_layout')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mb-4">{{trans('messages.login')}}</h1>
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
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="email" class="float-right">Email: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="email" class="form-control" name="email" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="password" class="float-right">{{trans('messages.password')}}: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" id="password" class="form-control" name="password">
                            <a class="float-right" href="{{route('user.forgot_password-form')}}">{{trans('messages.forgot_password')}}</a><br>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit float-right btn btn-success">{{trans('messages.login')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
