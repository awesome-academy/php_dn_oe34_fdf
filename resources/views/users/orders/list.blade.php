@extends('layouts.users.master_layout')

@section('title', trans('messages.order'))

@section('content')
    <div class="container-fluid">
        <div class="container-fluid row justify-content-center">
            <div class="card container-fluid">
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="text-center">{{trans('messages.order')}}</h1>
                        <hr>
                        <h4 class="cart-font font-weight-bold ">{{trans('messages.user_information')}} </h4><br>
                        <div class="row cart-font">
                            <div class="col-6">
                                <label for="" class="">{{trans('messages.name')}}: {{$user->full_name}} </label>
                            </div>
                            <div class="col-6">
                                <label for="" class="">{{trans('messages.phone_number')}}: <span>{{$user->phone_number}}</span></label>
                            </div>
                            <div class="col-6">
                                <label for="" class="">{{trans('messages.email')}}: <span>{{$user->email}}</span></label>
                            </div>
                            <div class="col-6">
                                <label for="" class="">{{trans('messages.today')}}: <span>{{now()->toDateString()}}</span></label>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <table class="table-striped table table-responsive-lg cart-font">
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('messages.product')}}</th>
                                    <th>{{trans('messages.image')}}</th>
                                    <th>{{trans('messages.unit_price')}}</th>
                                    <th>{{trans('messages.quantity')}}</th>
                                    <th class="text-center">{{trans('messages.total_price')}}</th>
                                </tr>
                                <tbody class="table-body">
                                <!--Order products will append here-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script src="{{mix('js/orders/list.js')}}"></script>
@endsection
