@extends('layouts.admin.master_layout')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid row justify-content-center">
            <div class="card container-fluid">
                <div class="card-header">
                    <div class="card-title">
                        <form action="{{route('order.list')}}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{request()->query('search')}}">
                                <input type="hidden" name="searchBy" value="order_label">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="order_code" value="order_code" {{request()->input('search_key') == 'order_code' ? 'checked' : ''}}>
                                    <label for="order_code">{{trans('messages.order_code')}}</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="total_price" value="total_price" {{request()->input('search_key') == 'total_price' ? 'checked' : ''}}>
                                    <label for="total_price">{{trans('messages.total_price')}}</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="status" value="status" {{request()->input('search_key') == 'status' ? 'checked' : ''}}>
                                    <label for="status">{{trans('messages.status')}}</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="float-right">
                        {{$orders->onEachSide(1)->links()}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="text-center">{{trans('messages.order_list')}}</h1>
                        <div class="row">
                            <table class="table-striped table">
                                <tr class="text-center">
                                    <th>#</th>
                                    <th class="width-60 text-left">{{trans('messages.order_code')}}</th>
                                    <th class="width-15">{{trans('messages.total_price')}}</th>
                                    <th class="width-15">{{trans('messages.status')}}</th>
                                    <th class="width-5">{{trans('messages.action')}}</th>
                                </tr>
                                @foreach($orders as $key => $item)
                                    <tr class="text-center">
                                        <td>{{$key + $orders->firstItem()}}</td>
                                        <td class="text-left">{{$item->order_code}}</td>
                                        <td>$ {{number_format($item->total_price)}}</td>
                                        <td>
                                            <div class="btn-group">
                                            </div>
                                            <span class="width-100px badge badge-pill badge-{{ $item->color_status }}">{{trans('messages.'.strtolower($item->name_status))}}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="{{route('order.detail', $item->id)}}">{{trans('messages.detail')}}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            @if(count($orders) == 0)
                                <div class="text-center container-fluid">
                                    <p id="no-order">{{trans('messages.no_item_list')}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
