@extends('layouts.admin.master_layout')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid row justify-content-center">
            <div class="card container-fluid">
                <div class="card-header">
                    @include('admin.commons.status_messages')
                    <div class="card-title">
                        <form action="{{route('product.list')}}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{request()->input('search')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="name" value="name" {{request()->input('search_key') == 'name' ? 'checked' : ''}}>
                                    <label for="name">{{trans('messages.name')}}</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="price" value="price" {{request()->input('search_key') == 'price' ? 'checked' : ''}}>
                                    <label for="price">{{trans('messages.price')}}</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="search_key" id="category" value="category" {{request()->input('search_key') == 'category' ? 'checked' : ''}}>
                                    <label for="category">{{trans('messages.category')}}</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="float-left ml-3">
                        <a href="{{route('product.create-form')}}" class="btn btn-info float-right mb-1">
                            <i class="fa fa-plus"></i> <span class="d-none d-sm-inline-block">{{trans('messages.create_new_product')}}</span>
                        </a>
                    </div>
                    <div class="float-right">
                        {{$products->onEachSide(1)->links()}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="text-center">{{trans('messages.product_list')}}</h1>
                        <div class="row">
                            <table class="table-striped table table-responsive-xl">
                                <tr class="text-center">
                                    <th>#</th>
                                    <th class="width-35 text-left">{{trans('messages.name')}}</th>
                                    <th>{{trans('messages.price')}}</th>
                                    <th>{{trans('messages.category')}}</th>
                                    <th>{{trans('messages.image')}}</th>
                                    <th>{{trans('messages.action')}}</th>
                                </tr>
                                @foreach($products as $key => $item)
                                    <tr class="text-center">
                                        <td>{{$key + $products->firstItem()}}</td>
                                        <td class="text-left">{{$item->name}}</td>
                                        <td>{{number_format($item->price)}} $</td>
                                        <td>{{$item->category->name}}</td>
                                        <td>
                                            <img src="{{asset($item->productImages->where('image_type', \App\Model\ProductImage::$types['Avatar'])->first()['image_path'])}}" width="150" height="150"
                                                 alt="{{trans('messages.no_image')}}">
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-warning" href="{{route('product.edit', $item->id)}}">{{trans('messages.edit')}}</a>
                                                <a class="btn btn-danger delete-product" data-csrf-token="{{csrf_token()}}" data-product-id="{{$item->id}}" href="#">{{trans('messages.delete')}}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            @if(count($products) == 0)
                                <div class="text-center container-fluid">
                                    <p><i>{{trans('messages.no_item_list')}}</i></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{mix('js/products/list.js')}}"></script>
@endsection
