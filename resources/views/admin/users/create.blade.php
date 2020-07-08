@extends('layouts.admin.master_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans('messages.create_new_user')}}</div>
                    <div class="card-body">
                        <div>
                            <a href="{{url()->previous()}}">
                                <button class="btn btn-primary">{{trans('messages.back')}}</button>
                            </a>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-9 well well-sm col-md-offset-4 container">
                                    <form action="{{route('user.create')}}" method="post" class="form"
                                          role="form">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.full_name')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <input type="text" class="form-control" name="full_name"
                                                       value="{{old('full_name')}}">
                                                @error('full_name')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.username')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <input type="text" class="form-control" name="username"
                                                       value="{{old('username')}}">
                                                @error('username')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.email')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <input type="text" class="form-control" name="email"
                                                       value="{{old('email')}}">
                                                @error('email')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.password')}}: </label>
                                            </div>
                                            <div class="col-xs-3 col-md-9">
                                                <input type="password" class="form-control mb-1" name="password">
                                                @error('password')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.password_confirm')}}: </label>
                                            </div>
                                            <div class="col-xs-6 col-md-9">
                                                <input type="password" class="form-control"
                                                       name="password_confirmation">
                                                @error('password_confirmation')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.phone_number')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <input type="tel" class="form-control" name="phone_number"
                                                       value="{{old('phone_number')}}">
                                                @error('phone_number')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.role')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <div class="">
                                                    <input type="radio" id="user" name="role_id"
                                                           value="2" checked>
                                                    <label for="user">{{trans('messages.user')}}</label>
                                                </div>
                                                <div class="">
                                                    <input type="radio" id="admin" name="role_id"
                                                           value="1">
                                                    <label for="admin">{{trans('messages.admin')}}</label>
                                                </div>
                                                @error('role_id')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-lg btn-success btn-block col-md-5 container"> {{trans('messages.create_new_user')}}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
