<div class="side-bar col-md-3">
    <div class="search-hotel">
        <h3 class="agileits-sear-head">{{trans('messages.search_here')}}</h3>
        <form action="#" method="post">
            <input type="search" placeholder="Product name..." name="search" required="">
            <button type="submit" class="btn btn-default"><span class="fa fa-search"></span></button>
        </form>
    </div>
    <!-- price range -->
    <div class="range">
        <h3 class="agileits-sear-head">{{trans('messages.price')}}</h3>
        From <input type="text" class="form-control"> To <input type="text" class="form-control">
    </div>
    <!-- //price range -->
    <!-- order by -->
    <div class="left-side">
        <h3 class="agileits-sear-head">{{trans('messages.order_by')}}</h3>
        <ul class="nav">
            <li class="nav-item">
                <a href=""><span class="span">{{trans('messages.food')}}</span></a>
            </li>
            <li class="nav-item">
                <a href=""><span class="span">{{trans('messages.drink')}}</span></a>
            </li>
            <li class="nav-item">
                <a href=""><span class="span">A-Z</span></a>
            </li>
            <li class="nav-item">
                <a href=""><span class="span">Z-A</span></a>
            </li>
        </ul>
    </div>
    <!-- //order by -->
    <!-- reviews -->
    <div class="customer-rev left-side">
        <h3 class="agileits-sear-head">{{trans('messages.customer_review')}}</h3>
        <ul>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <span>5.0</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>4.0</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>3.5</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>3.0</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>2.5</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- //reviews -->
    <!-- categories -->
    <div class="left-side">
        <h3 class="agileits-sear-head">{{trans('messages.categories')}}</h3>
        <ul class="nav">
            <li class="nav-item">
                <a class="" data-toggle="collapse" data-target="#sub_food" href="#">
                    <span class="text-dark">{{trans('messages.food')}}</span>
                </a>
            </li>
            <ul id="sub_food" class="nav collapse">
                <a href="">
                    <li class="nav-item text-center">Sub food</li>
                </a>
                <a href="">
                    <li class="nav-item text-center">Sub food</li>
                </a>
                <a href="">
                    <li class="nav-item text-center">Sub food</li>
                </a>
            </ul>
            <li class="nav-item">
                <a class="" data-toggle="collapse" data-target="#sub_drink" href="#">
                    <span class="text-dark">{{trans('messages.drink')}}</span>
                </a>
            </li>
            <ul id="sub_drink" class="nav collapse">
                <a href="">
                    <li class="nav-item text-center">Sub drink</li>
                </a>
                <a href="">
                    <li class="nav-item text-center">Sub drink</li>
                </a>
                <a href="">
                    <li class="nav-item text-center">Sub drink</li>
                </a>
            </ul>
        </ul>
    </div>
    <!-- //categories -->
</div>
