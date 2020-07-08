@extends('layouts.admin.master_layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="float-left ml-3">
                            <a href="{{url()->previous()}}" class="btn btn-info float-right"><i class="fa fa-arrow-left mr-1"></i>{{trans('messages.back')}}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <h1 class="text-center mb-4">{{trans('messages.information')}}</h1>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-7 well well-sm col-md-offset-4 container">
                                    <form action="{{route('user.update', $user->id)}}" method="post" class="form" role="form">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.full_name')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <input type="text" class="form-control" name="full_name"
                                                       value="{{$user->full_name}}">
                                                @error('full_name')
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
                                                       value="{{$user->email}}">
                                                @error('email')
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
                                                       value="{{$user->phone_number}}">
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
                                                           value="2" {{$user->role_id === \App\Model\Role::$roles['User'] ? 'checked' : ''}}>
                                                    <label for="user">{{trans('messages.user')}}</label>
                                                </div>
                                                <div class="">
                                                    <input type="radio" id="admin" name="role_id"
                                                           value="1" {{$user->role_id === \App\Model\Role::$roles['Admin'] ? 'checked' : ''}}>
                                                    <label for="admin">{{trans('messages.admin')}}</label>
                                                </div>
                                                @error('role_id')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-lg btn-primary btn-block col-md-5 container"> {{trans('messages.update')}}
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
