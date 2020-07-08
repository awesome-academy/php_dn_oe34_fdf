@extends('layouts.admin.master_layout')

@section('content')
    <div class="container">
        <div class="login-box align-center-form">
            <div class="login-logo">
                <a href="">{{trans('messages.forgot_password')}}</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">{{trans('messages.forgot_password_message')}}</p>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <span>{{$error}}</span>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <form action="{{route('forgot_password')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{trans('messages.send')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
