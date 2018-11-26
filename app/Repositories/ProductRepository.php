<?php

namespace lazyworker\Repositories;

use lazyworker\Models\Product;

class ProductRepository
{
    /** @var Product inject Product model */
    protected $product;

    /**
     * UserRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getByCategoryId($categoryId) {
        return Product::whereHas('product_subcategory', function ($q) use ($categoryId) {
            $q->where('product_category_id', $categoryId);
        })->get();
    }
}