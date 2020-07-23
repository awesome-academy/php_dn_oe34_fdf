@foreach($cart_products as $key => $item)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$item->name}}</td>
        <td><img class="img-item-cart" src="{{$item->image_path}}"></td>
        <td>$ {{number_format($item->price)}}</td>
        <td class="cart-custom-quantity">
            <input type="number" value="{{$item->quantity}}" class="form-control cart-custom-quantity" data-product-id="{{$item->id}}">
        </td>
        <td class="text-center">$ {{number_format($item->total_price)}}</td>
        <td class="text-center">
            <button class="btn btn-lg btn-danger btn-cart-delete" type="button" data-product-id="{{$item->id}}">X</button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7"><span class="float-right mr-5"><b class="cart-font">{{trans('messages.total')}}: $ {{number_format($total_price)}}</b></span></td>
</tr>
<tr>
    @auth
        <td colspan="7"><a href="{{route('show.order')}}" type="button" class="btn col-2 float-right container btn-primary">{{trans('messages.order')}}</a></td>
    @else
        <td colspan="7"><a type="button" href="{{route('user.login-form')}}" class="btn col-2 float-right container btn-success">{{trans('messages.login')}}</a></td>
    @endauth
</tr>

<script src="{{mix('/js/carts/cart.js')}}"></script>
