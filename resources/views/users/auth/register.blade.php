@extends('layouts.users.master_layout')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mb-4">{{trans('messages.register')}}</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">
                @if($errors->any())
                    @foreach($errors->get('errors') as $messages)
                        <div class="text-center alert alert-danger">
                            <span>{{$messages}}</span>
                        </div>
                    @endforeach
                @endif
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="full_name" class="float-right">{{trans('messages.full_name')}}: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="full_name" class="form-control" name="full_name" autofocus>
                            @if($errors->any())
                                @foreach($errors->get('full_name') as $messages)
                                    <i class="error-messages" >*{{$messages}}</i><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="username" class="float-right">{{trans('messages.username')}}: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="username" class="form-control" name="username">
                            @if($errors->any())
                                @foreach($errors->get('username') as $messages)
                                    <i class="error-messages">*{{$messages}}</i><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="email" class="float-right">Email: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="email" class="form-control" name="email">
                            @if($errors->any())
                                @foreach($errors->get('email') as $messages)
                                    <i class="error-messages">*{{$messages}}</i><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="password" class="float-right">{{trans('messages.password')}}: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" id="password" class="form-control" name="password">
                            @if($errors->any())
                                @foreach($errors->get('password') as $messages)
                                    <i class="error-messages">*{{$messages}}</i><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="password_confirm" class="float-right">{{trans('messages.password_confirm')}}: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" id="password_confirm" class="form-control" name="password_confirmation">
                            @if($errors->any())
                                @foreach($errors->get('password_confirmation') as $messages)
                                    <i class="error-messages">*{{$messages}}</i><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="phone_number" class="float-right">{{trans('messages.phone_number')}}: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="phone_number" class="form-control" name="phone_number">
                            @if($errors->any())
                                @foreach($errors->get('phone_number') as $messages)
                                    <i class="error-messages">*{{$messages}}</i><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn-submit float-right btn btn-success">{{trans('messages.register')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
