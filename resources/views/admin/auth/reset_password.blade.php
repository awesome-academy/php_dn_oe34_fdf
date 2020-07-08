@extends('layouts.admin.master_layout')

@section('content')
    <div class="container">
        <div class="login-box align-center-form">
            <div class="login-logo">
                <a href="">{{trans('messages.reset_password')}}</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
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
                    <form action="{{route('reset_password')}}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{request()->get('token')}}">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="{{trans('messages.new_password')}}" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="{{trans('messages.password_confirm')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{trans('messages.reset_password')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
