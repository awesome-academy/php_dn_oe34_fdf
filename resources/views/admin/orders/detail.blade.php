@extends('layouts.admin.master_layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.commons.status_messages')
            <div class="col-md-4 col-sm-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('messages.order_info')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <p class="text-bold d-inline">{{trans('messages.name')}}:</p>
                                <p class="d-inline">{{$order->user->full_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <p class="text-bold d-inline">{{trans('messages.phone_number')}}:</p>
                                <p class="d-inline">{{$order->user->phone_number}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <p class="text-bold d-inline">{{trans('messages.total_price')}}:</p>
                                <p class="d-inline">$ {{number_format($order->total_price)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <form action="{{route('order.update_status', $order->id)}}" method="post" role="form" enctype="multipart/form-data">
                                    <p class="mb-0">
                                        <span class="text-bold ">{{trans('messages.status')}}: </span>
                                        @csrf
                                        @method('PUT')
                                        <select name="status" id="" class="bg bg-{{$order->color_status}} p-2 rounded">
                                            @foreach(\App\Model\Order::$status as $key => $value)
                                                <option value="{{$value}}" {{$key == $order->name_status ? 'selected' : ''}}>
                                                    {{$key}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="submit" value="{{trans('messages.change')}}" class="btn btn-outline-secondary mx-3">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{route('order.list')}}" class="btn btn-primary">{{trans('messages.back')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('messages.product_list')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th class="text-left width-35">{{trans('messages.name')}}</th>
                                    <th class="width-15">{{trans('messages.image')}}</th>
                                    <th class="width-15">{{trans('messages.unit_price')}}</th>
                                    <th class="width-5">{{trans('messages.quantity')}}</th>
                                    <th class="width-15">{{trans('messages.total')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key  => $item)
                                    <tr class="text-center">
                                        <td>{{++$key}}</td>
                                        <td class="text-left">{{$item->name}}</td>
                                        <td><img class="width-100px height-100px" src="{{asset($item->image_path)}}" alt=""></td>
                                        <td>$ {{number_format($item->price)}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>$ {{number_format($item->total)}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
