<div class="header-bot ">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <!-- header-bot-->
        <div class="col-md-3 logo_agile">
            <h1>
                <a href="{{route('homepage')}}">
                    <span>F</span>oods
                    <span><i>&</i></span>
                    <span>D</span>rinks
                </a>
            </h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-9 header">
            <!-- header lists -->
            <ul>
                <li>
                    <a href="#">
                        <span class="fa fa-truck" aria-hidden="true"></span>{{trans('messages.track_order')}}</a>
                </li>
                <li>
                    <span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
                </li>
                @auth
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal1">
                            <span class="fa fa-unlock-alt" aria-hidden="true"></span>{{trans('messages.profile')}} </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}">
                            <span class="fa fa-pen-square" aria-hidden="true"></span>{{trans('messages.logout')}} </a>
                    </li>
                @else
                    <li>
                        <a href="{{route('user.login-form')}}">
                            <span class="fa fa-unlock-alt" aria-hidden="true"></span>{{trans('messages.login')}} </a>
                    </li>
                    <li>
                        <a href="{{route('register-form')}}">
                            <span class="fa fa-pen-square" aria-hidden="true"></span>{{trans('messages.register')}} </a>
                    </li>
                @endauth
                <li>
                    <a href="#">
                        <span class="fa fa-language" aria-hidden="true"></span>{{trans('messages.language')}}</a>
                </li>
            </ul>
            <!-- //header lists -->
            <!-- search -->
            <div class="agileits_search">
                <form action="#" method="post">
                    <input name="Search" type="search" placeholder="{{trans('messages.search_placeholder')}}" required="">
                    <button type="submit" class="btn btn-default" aria-label="Left Align">
                        <span class="fa fa-search" aria-hidden="true"> </span>
                    </button>
                </form>
            </div>
            <!-- //search -->
            <!-- cart details -->
            <div class="top_nav_right">
                <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                    <a href="{{route('list_cart')}}">
                        <span class='badge badge-danger cart-count'>0</span>
                        <button class="w3view-cart">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        </button>
                    </a>
                </div>
            </div>
            <!-- //cart details -->
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="ban-top">
    <div class="container">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="nav">
                    <ul class="nav">
                        <li class="active mr-5">
                            <a class="nav-stylehead" href="{{route('homepage')}}">{{trans('messages.homepage')}}</a>
                        </li>
                        <li class="mr-5">
                            <a class="nav-stylehead" href="#">{{trans('messages.shop')}}</a>
                        </li>
                        @auth
                            <li class="mr-5">
                                <a class="nav-stylehead" href="#">{{trans('messages.favorite')}}</a>
                            </li>
                            <li class="mr-5">
                                <a class="nav-stylehead" href="#">{{trans('messages.suggest')}}</a>
                            </li>
                        @endauth
                        <li class="">
                            <a class="nav-stylehead" href="#">{{trans('messages.contact')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
