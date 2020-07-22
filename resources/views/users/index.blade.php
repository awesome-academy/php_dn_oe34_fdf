@extends('layouts.users.master_layout')

@section('title')
    {{trans('messages.homepage')}}
@endsection

@section('content')
    <!-- banner -->
    <div class="container-fluid home-banner">
        <img
            src="{{url('https://previews.123rf.com/images/baibakova/baibakova1908/baibakova190800110/129010048-assorted-indian-food-on-black-background-indian-cuisine-top-view-with-copy-space-panorama-banner.jpg')}}"
            alt="Banner" class="container-fluid"
            height="100%">
    </div>
    <!-- //banner -->

    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">{{trans('messages.top_product')}}
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <!-- product left -->
        @component('users.components.sidebar')
        @endcomponent
        <!-- //product left -->
            <!-- product right -->
            <div class="agileinfo-ads-display col-md-9">
                <div class="wrapper">
                    <!-- first section (foods) -->
                @component('users.components.product', ['products' => $products])
                @endcomponent
                <!-- //first section (products) -->
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
    <!-- //top products -->
@endsection
@section('footer_script')
    <script src="{{mix('/js/carts/cart.js')}}"></script>
@endsection
