<div class="product-sec1">
    <h3 class="heading-tittle">{{trans('messages.drink')}}</h3>
    <div class="col-md-4 product-men">
        <div class="men-pro-item simpleCart_shelfItem">
            <div class="men-thumb-item">
                <img src="#" alt="">
                <span class="product-new-top">{{trans('messages.new')}}</span>
            </div>
            <div class="item-info-product ">
                <h4>
                    <a href="#">Orange Juice, 1L</a>
                </h4>
                <div class="info-product-price">
                    <span class="item_price">$78.00</span>
                    <del>$110.00</del>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                    <form action="" method="get">
                        @csrf
                        <input type="submit" name="submit" value="Add to cart" class="button"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
