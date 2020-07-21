@extends('layouts.admin.master_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans('messages.create_new_category')}}</div>
                    <div class="card-body">
                        <div>
                            <a href="{{url()->previous()}}">
                                <button class="btn btn-primary">{{trans('messages.back')}}</button>
                            </a>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-9 well well-sm col-md-offset-4 container">
                                    <form action="{{route('category.create')}}" method="post" class="form"
                                          role="form">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.name')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <input type="text" class="form-control" name="name"
                                                       value="{{old('name')}}">
                                                @error('name')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.parent_id')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <select name="parent_id" id="" class="form-control">
                                                    @foreach($categories as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('parent_id')
                                                <i class="error-messages">*{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-lg btn-success btn-block col-md-5 container"> {{trans('messages.create_new_category')}}
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
