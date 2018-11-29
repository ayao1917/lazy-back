<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\PurchaseOrder;
use lazyworker\Services\PurchaseOrderService;
use lazyworker\Exports\ordersExport;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseOrderController extends Controller
{
    /** @var  PurchaseOrderService inject PurchaseOrderService */
    protected $purchaseOrderService;

    /**
     * UserController constructor.
     *
     * @param PurchaseOrderService $purchaseOrderService
     */
    public function __construct(PurchaseOrderService $purchaseOrderService)
    {
        $this->purchaseOrderService = $purchaseOrderService;
    }

    public function index()
    {
        return $this->purchaseOrderService->index();
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        return $purchaseOrder;
    }

    public function store(Request $request)
    {
        $purchaseOrder = $this->purchaseOrderService->create($request);

        return response()->json($purchaseOrder, 201);
    }

    public function update(Request $request, PurchaseOrder $id)
    {
        $purchaseOrder = $this->purchaseOrderService->update($request, $id);

        return response()->json($purchaseOrder, 200);
    }

    public function delete($id)
    {
        $this->purchaseOrderService->delete($id);;

        return response()->json(null, 204);
    }

    public function export(Request $request) {
        $ids = $request->get('ids');

        return Excel::download(new ordersExport($this->purchaseOrderService, $ids), 'orders.xlsx');
    }
}
