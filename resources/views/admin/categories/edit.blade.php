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
                                    <form action="{{route('category.update', $category->id)}}" method="post" class="form" role="form">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <div class="col-xs-3 col-md-3">
                                                <label for="" class="float-md-right mt-2">{{trans('messages.name')}}: </label>
                                            </div>
                                            <div class="col-xs-9 col-md-9">
                                                <input type="text" class="form-control" name="name"
                                                       value="{{$category->name}}">
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
                                                    <option value="">{{trans('messages.none')}}</option>
                                                    @foreach($categories as $item)
                                                        <option value="{{$item->id}}" {{$item->id === $category->parent_id ? 'selected' : ''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('parent_id')
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
