@extends('layouts.admin.master_layout')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid row justify-content-center">
            <div class="card container-fluid">
                <div class="card-header">
                    @include('admin.commons.status_messages')
                    <div class="card-title">
                        <form action="{{route('user.list')}}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{request()->input('search')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <input type="radio" name="search_key" id="full_name" value="full_name" {{request()->input('search_key') == 'full_name' ? 'checked' : ''}}>
                                    <label for="full_name">{{trans('messages.full_name')}}</label>
                                </div>
                                <div class="col-5">
                                    <input type="radio" name="search_key" id="username" value="username" {{request()->input('search_key') == 'username' ? 'checked' : ''}}>
                                    <label for="username">{{trans('messages.username')}}</label>
                                </div>
                                <div class="col-5">
                                    <input type="radio" name="search_key" id="email" value="email" {{request()->input('search_key') == 'email' ? 'checked' : ''}}>
                                    <label for="email">{{trans('messages.email')}}</label>
                                </div>
                                <div class="col-5">
                                    <input type="radio" name="search_key" id="phone_number" value="phone_number" {{request()->input('search_key') == 'phone_number' ? 'checked' : ''}}>
                                    <label for="phone_number">{{trans('messages.phone_number')}}</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="float-left ml-3">
                        <a href="{{route('user.create-form')}}" class="btn btn-info float-right mb-1">
                            <i class="fa fa-plus"></i> <span class="d-none d-sm-inline-block">{{trans('messages.create_new_user')}}</span>
                        </a>
                    </div>
                    <div class="float-right">
                        {{$users->onEachSide(1)->links()}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="text-center">{{trans('messages.user_list')}}</h1>
                        <div class="row">
                            <table class="table-striped table table-responsive-xl">
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('messages.full_name')}}</th>
                                    <th>{{trans('messages.username')}}</th>
                                    <th>{{trans('messages.email')}}</th>
                                    <th>{{trans('messages.phone_number')}}</th>
                                    <th>{{trans('messages.role')}}</th>
                                    <th class="text-center">{{trans('messages.action')}}</th>
                                </tr>
                                @foreach($users as $key => $item)
                                    <tr>
                                        <td>{{$key + $users->firstItem()}}</td>
                                        <td>{{$item->full_name}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone_number}}</td>
                                        <td>{{ucfirst($item->role->name)}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning" href="{{route('user.edit', $item->id)}}">{{trans('messages.edit')}}</a>
                                                <a class="btn btn-danger delete-user" data-csrf-token="{{csrf_token()}}" data-user-id="{{$item->id}}" href="#">{{trans('messages.delete')}}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            @if(count($users) === 0)
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
    <script src="{{mix('js/users/list.js')}}"></script>
@endsection
