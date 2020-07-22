@extends('layouts.users.master_layout')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid row justify-content-center">
            <div class="card container-fluid">
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="text-center">{{trans('messages.cart')}}</h1>
                        <div class="row">
                            <table class="table-striped table table-responsive-lg cart-font">
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('messages.product')}}</th>
                                    <th>{{trans('messages.image')}}</th>
                                    <th>{{trans('messages.unit_price')}}</th>
                                    <th>{{trans('messages.quantity')}}</th>
                                    <th class="text-center">{{trans('messages.total_price')}}</th>
                                    <th class="text-center">{{trans('messages.action')}}</th>
                                </tr>
                                <tbody class="table-body">
                                    <!--Cart products will append here-->
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
    <script src="{{mix('js/carts/list.js')}}"></script>
@endsection
