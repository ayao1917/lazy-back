<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\ProductItem;
use lazyworker\Repositories\ProductItemRepository;

class ProductItemController extends BaseController
{
    /** @var  ProductItemRepository inject ProductItemRepository */
    protected $productItemRepository;

    /**
     * UserController constructor.
     *
     * @param ProductItemRepository $productItemRepository
     */
    public function __construct(ProductItemRepository $productItemRepository)
    {
        $this->productItemRepository = $productItemRepository;
    }

    public function index()
    {
        if (!isset($_GET['productId'])) {
            return $this->sendResponse(ProductItem::all());
        }

        $productId = $_GET['productId'];
        $items = $this->productItemRepository->getByProductId($productId);

        return $this->sendResponse($items);
    }

    public function show(ProductItem $productItem)
    {
        return $productItem;
    }

    public function store(Request $request)
    {
        $productItem = ProductItem::create($request->all());

        return response()->json($productItem, 201);
    }

    public function update(Request $request, ProductItem $productItem)
    {
        $productItem->update($request->all());

        return response()->json($productItem, 200);
    }

    public function delete(ProductItem $productItem)
    {
        $productItem->delete();

        return response()->json(null, 204);
    }
}
