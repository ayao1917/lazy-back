<?php

namespace lazyworker\Repositories;

use lazyworker\Models\ProductItem;

class ProductItemRepository
{
    /** @var ProductItem inject ProductItem model */
    protected $productItem;

    /**
     * UserRepository constructor.
     * @param ProductItem $productItem
     */
    public function __construct(ProductItem $productItem)
    {
        $this->productItem = $productItem;
    }

    public function getByProductId($productId) {
        return ProductItem::where('product_id', $productId)->get();
    }
}