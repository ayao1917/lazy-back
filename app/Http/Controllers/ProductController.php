<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Product;
use lazyworker\Repositories\ProductRepository;

class ProductController extends BaseController
{
    /** @var  ProductRepository inject ProductRepository */
    protected $productRepository;

    /**
     * UserController constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * List product
     *
     * @param  [string] categoryId
     * @return [array] product list
     */
    public function index()
    {
        if (!isset($_GET['categoryId'])) {
            return $this->sendResponse(Product::all());
        }

        $categoryId = $_GET['categoryId'];
        $products = $this->productRepository->getByCategoryId($categoryId);

        return $this->sendResponse($products);
    }

    public function show(Product $product)
    {
        return $this->sendResponse($product);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return $this->sendResponse($product);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return $this->sendResponse($product);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return $this->sendResponse(null, null, 204);
    }
}
