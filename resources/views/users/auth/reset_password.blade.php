@extends('layouts.users.master_layout')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mb-4">{{trans('messages.reset_password')}}</h1>
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
                <form action="{{route('reset_password')}}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{request()->get('token')}}">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="password" class="float-right">{{trans('messages.new_password')}}: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" id="password" class="form-control" name="password" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="password_confirm" class="float-right">{{trans('messages.password_confirm')}}: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="password" id="password_confirm" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <button type="submit" class="btn-submit float-right btn btn-success">{{trans('messages.send')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
