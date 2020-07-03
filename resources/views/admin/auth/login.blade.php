@extends('layouts.admin.master_layout')

@section('content')
    <div class="container">
        <div style="margin: 0 auto" class="login-box">
            <div class="login-logo">
                <a href="">{{trans('messages.login')}}</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">{{trans('messages.admin_login')}}</p>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <span>{{$error}}</span>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-8 mb-1">
                                <a href="">{{trans('messages.forgot_password')}}</a>
                            </p>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">{{trans('messages.login')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
