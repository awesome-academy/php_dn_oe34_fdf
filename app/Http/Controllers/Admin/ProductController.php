<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Model\Category;
use App\Model\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var ProductService
     */
    protected $productService;

    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);
        $this->productService = app(ProductService::class);
    }

    public function listProducts(Request $request)
    {
        $limits = $request->get('limits', config('custom.paginate.limits'));
        $search = $request->get('search', '');
        $searchKey = $request->get('search_key', '');

        $products = $this->productRepository->listAll(Product::query(), $limits, $search, $searchKey);

        return view('admin.products.list', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $params = $request->except('_token', 'avatar', 'thumbnails');
        $avatar = $request->file('avatar');
        $thumbnails = $request->file('thumbnails');

        $status = $this->productService->store($params, $avatar, $thumbnails);

        if (!$status) {
            return redirect(route('product.list'))->with('failed', trans('messages.create_failed'));
        }

        return redirect(route('product.list'))->with('success', trans('messages.create_success'));
    }

    public function edit($id)
    {
        $categories = Category::all();

        $product = $this->productRepository->findObject(Product::all(), 'id', $id);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $params = $request->except('_token', '_method', 'avatar', 'thumbnails');
        $avatar = $request->file('avatar');
        $thumbnails = $request->file('thumbnails');

        $status = $this->productService->update($id, $params, $avatar, $thumbnails);

        if (!$status) {
            return redirect(route('product.list'))->with('failed', trans('messages.update_failed'));
        }

        return redirect(route('product.list'))->with('success', trans('messages.update_success'));
    }

    public function destroy($id)
    {
        $product = $this->productRepository->findObject(Product::all(), 'id', $id);
        $status = $this->productRepository->destroy($product);

        if (!$status) {
            return response()->json(trans('messages.delete_failed'));
        }

        return response()->json(trans('messages.delete_success'));
    }
}
