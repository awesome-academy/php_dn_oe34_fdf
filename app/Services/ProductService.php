<?php

namespace App\Services;

use App\Model\Product;
use App\Model\ProductImage;
use App\Repositories\ProductRepository;
use DB;
use Exception;
use Log;

class ProductService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);
    }

    public function store($params, $avatar, $thumbnails)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($params);

            $avatarParams = $this->getAvatarParams($avatar, $product->id);
            $thumbnailParams = $this->getThumbnailParams($thumbnails, $product->id);

            if (empty($avatarParams) || empty($thumbnailParams)) {
                throw new Exception(trans('messages.store_image_failed'));
            }

            $status = $this->productRepository->storeProductImage($avatarParams, $thumbnailParams);

            if (!$status) {
                throw new Exception(trans('messages.store_image_failed'));
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            DB::rollBack();

            return false;
        }
    }

    public function getAvatarParams($avatar, $id)
    {
        if (!empty($avatar)) {
            $avatarName = $avatar->getClientOriginalName();
            $path = ProductImage::$paths['Avatar'] . $id . '/';
            $type = ProductImage::$types['Avatar'];

            $avatar->move(public_path($path), $avatarName);

            return [
                'product_id' => $id,
                'image_path' => $path . $avatarName,
                'image_type' => $type,
            ];
        }

        return null;
    }

    public function getThumbnailParams($thumbnails, $product_id)
    {
        if (!empty($thumbnails)) {
            $path = ProductImage::$paths['Thumbnail'] . $product_id . "/";
            $type = ProductImage::$types['Thumbnail'];
            $thumbnailParams = [];

            foreach ($thumbnails as $thumbnail) {
                $thumbnailName = $thumbnail->getClientOriginalName();

                $thumbnailParams[] = [
                    'product_id' => $product_id,
                    'image_path' => $path . $thumbnailName,
                    'image_type' => $type,
                ];

                $thumbnail->move(public_path($path), $thumbnailName);
            }

            return $thumbnailParams;
        }

        return null;
    }

    public function update($id, $params, $avatar, $thumbnails)
    {
        if (empty($avatar) && empty($thumbnails)) {
            $product = $this->productRepository->findObject(Product::all(), 'id', $id);

            return $this->productRepository->update($product, $params);
        }

        $avatarParams = $this->getAvatarParams($avatar, $id);
        $thumbnailParams = $this->getThumbnailParams($thumbnails, $id);

        return $this->productRepository->updateProduct($id, $params, $avatarParams, $thumbnailParams);
    }

    public function getCartProducts($params)
    {
        $products = Product::with('productImages')->get();

        $cartProducts = $this->getProductAdditionAttribute($params, $products);

        $totalPriceCart = $products->sum('total_price');

        return [
            'cart_products' => $cartProducts,
            'total_price' => $totalPriceCart,
        ];
    }

    public function getProductAdditionAttribute($params, $collection)
    {
        $cartProducts = [];

        if (!empty($collection)) {
            foreach ($params as $param) {
                $product = $this->productRepository->findObject($collection, 'id', $param['product_id']);

                if (empty($product)) {
                    continue;
                }

                $avatar = $this->productRepository->findObject($product->productImages, 'image_type', ProductImage::$types['Avatar']);
                $imagePath = '';

                if (!empty($avatar)) {
                    $imagePath = $avatar->image_path;
                }

                $product->quantity = $param['quantity'];
                $product->image_path = $imagePath;
                $product->total_price = $product->quantity * $product->price;

                $cartProducts[] = $product;
            }
        }

        return $cartProducts;
    }
}
