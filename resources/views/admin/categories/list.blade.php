@extends('layouts.admin.master_layout')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid row justify-content-center">
            <div class="card container-fluid">
                <div class="card-header">
                    @include('admin.commons.status_messages')
                    <div class="card-title">
                        <form action="{{route('category.list')}}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{request()->input('search')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="name" value="name" {{request()->input('search_key') == 'name' ? 'checked' : ''}}>
                                    <label for="name">{{trans('messages.name')}}</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="parent" value="parent_id" {{request()->input('search_key') == 'parent_id' ? 'checked' : ''}}>
                                    <label for="parent">{{trans('messages.parent_id')}}</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="id" value="id" {{request()->input('search_key') == 'id' ? 'checked' : ''}}>
                                    <label for="id">{{trans('messages.id')}}</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="float-left ml-3">
                        <a href="{{route('category.create-form')}}" class="btn btn-info float-right mb-1">
                            <i class="fa fa-plus"></i> <span class="d-none d-sm-inline-block">{{trans('messages.create_new_category')}}</span>
                        </a>
                    </div>
                    <div class="float-right">
                        {{$categories->onEachSide(1)->links()}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="text-center">{{trans('messages.category_list')}}</h1>
                        <div class="row">
                            <table class="table-striped table table-responsive-xl">
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('messages.name')}}</th>
                                    <th>{{trans('messages.id')}}</th>
                                    <th>{{trans('messages.parent_id')}}</th>
                                    <th class="text-center">{{trans('messages.action')}}</th>
                                </tr>
                                @foreach($categories as $key => $item)
                                    <tr>
                                        <td>{{$key + $categories->firstItem()}}</td>
                                        <td class="width-60">{{$item->name}}</td>
                                        <td>{{$item->id}}</td>
                                        <td>{{!empty($item->parent_id) ? $item->parent_id : 'N/A'}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-warning" href="{{route('category.edit', $item->id)}}">{{trans('messages.edit')}}</a>
                                                <a class="btn btn-danger delete-category" data-csrf-token="{{csrf_token()}}" data-category-id="{{$item->id}}" href="#">{{trans('messages.delete')}}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            @if(count($categories) == 0)
                                <div class="text-center container-fluid">
                                    <p><i>{{trans('messages.no_item_list')}}</i></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{mix('js/categories/list.js')}}"></script>
@endsection
