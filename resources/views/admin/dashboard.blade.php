@extends('layouts.admin.master_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{trans('messages.dashboard')}}</div>
                    <div class="card-body">
                        {{trans('messages.greeting_admin')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
