@foreach($cart_products as $key => $item)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$item->name}}</td>
        <td><img class="img-item-cart" src="{{$item->image_path}}"></td>
        <td>$ {{number_format($item->price)}}</td>
        <td class="cart-custom-quantity">{{$item->quantity}}</td>
        <td class="text-center">$ {{number_format($item->total_price)}}</td>
    </tr>
@endforeach
<tr>
    <td colspan="7"><span class="float-right mr-5"><b class="cart-font">{{trans('messages.total_quantity')}}: {{number_format($total_quantity)}} {{trans('messages.products')}}</b></span></td>
</tr>
<tr>
    <td colspan="7"><span class="float-right mr-5"><b class="cart-font">{{trans('messages.total_price')}}: $ {{number_format($total_price)}}</b></span></td>
</tr>
@auth()
    <tr>
        <form action="" method="post">
            <input type="hidden" id="total-price-input" value="{{$total_price}}">
            <input type="hidden" id="total-quantity-input" value="{{$total_quantity}}">
            <td colspan="7">
                <button class="btn col-2 float-right btn-create-order btn-primary" data-csrf-token="{{csrf_token()}}">{{trans('messages.create_order')}}</button>
            </td>
        </form>
    </tr>
@endauth
<script src="{{mix('/js/orders/create.js')}}"></script>
