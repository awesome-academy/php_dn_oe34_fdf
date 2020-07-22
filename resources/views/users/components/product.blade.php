<div class="product-sec1">
        <div class="col-12">{{$products->onEachSide(1)->links()}}</div>
    @foreach($products as $item)
        <div class="col-md-4 product-men">
            <div class="men-pro-item simpleCart_shelfItem">
                <div class="men-thumb-item">
                    <img class="img-item" src="{{asset($item->productImages->first()['image_path'])}}" alt="">
                    <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                            <a href="#" class="link-product-add-cart">{{trans('messages.quick_view')}}</a>
                        </div>
                    </div>
                    <span class="product-new-top">{{trans('messages.new')}}</span>
                </div>
                <div class="item-info-product ">
                    <h4>
                        <a href="#">{{$item->name}}</a>
                    </h4>
                    <div class="info-product-price">
                        <span class="item_price">${{number_format($item->price)}}</span>
                    </div>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <input type="submit" value="{{trans('messages.add_cart')}}" data-message="{{trans('messages.add_cart_message')}}" class="btn btn-cart button" data-product-id="{{$item->id}}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if(count($products) == 0)
        <div class="text-center container-fluid">
            <p><i>{{trans('messages.no_item_list')}}</i></p>
        </div>
    @endif
    <div class="clearfix"></div>
</div>
