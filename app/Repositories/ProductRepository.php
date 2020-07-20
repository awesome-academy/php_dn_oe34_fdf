<?php

namespace App\Repositories;

use App\Model\Product;
use App\Model\ProductImage;
use DB;
use Exception;
use Log;

class ProductRepository extends BaseRepository
{
    public function storeProductImage($avatarParams, $thumbnailParams)
    {
        try {
            DB::beginTransaction();
            ProductImage::create($avatarParams);

            foreach ($thumbnailParams as $thumbnail) {
                ProductImage::create($thumbnail);
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            DB::rollBack();

            return false;
        }
    }

    public function updateProduct($id, $params, $avatarParams, $thumbnailParams)
    {
        try {
            DB::beginTransaction();
            $product = $this->findObject(Product::all(), 'id', $id);

            if (empty($product)) {
                throw new Exception(trans('messages.update_failed'));
            }

            $product->update($params);

            $status = $this->updateProductImage($id, $avatarParams, $thumbnailParams);

            if (!$status) {
                throw new Exception(trans('messages.update_image_failed'));
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            DB::rollBack();

            return false;
        }
    }

    public function updateProductImage($id, $avatarParams, $thumbnailParams)
    {
        try {
            DB::beginTransaction();

            $productImage = $this->findObject(ProductImage::all(), 'product_id', $id);

            if (!empty($avatarParams)) {
                if (!empty($productImage)) {
                    $productImage->update($avatarParams);
                } else {
                    ProductImage::create($avatarParams);
                }
            }

            if (!empty($thumbnailParams)) {
                $this->deleteThumbnails($id);

                foreach ($thumbnailParams as $thumbnail) {
                    ProductImage::create($thumbnail);
                }
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            DB::rollBack();

            return false;
        }
    }

    public function deleteThumbnails($id)
    {
        try {
            $productThumbnails = ProductImage::where('image_type', ProductImage::$types['Thumbnail'])->where('product_id', $id)->get();

            foreach ($productThumbnails as $thumbnail) {
                $thumbnail->delete();
            }

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }
}
