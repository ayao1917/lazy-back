<?php

namespace lazyworker\Services;

use Illuminate\Http\Request;
use lazyworker\Repositories\PurchaseOrderRepository;

class PurchaseOrderService
{
    /** @var  PurchaseOrderRepository inject PurchaseOrderRepository */
    protected $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepository)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepository ;
    }

    public function index()
    {
        return $this->purchaseOrderRepository->all();
    }

    public function create(Request $request)
    {
        $attributes = $request->all();

        return $this->purchaseOrderRepository->create($attributes);
    }

    public function read($id)
    {
        return $this->purchaseOrderRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->all();

        return $this->purchaseOrderRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->purchaseOrderRepository->delete($id);
    }

    public function export($ids)
    {
        $purchaseOrders = $this->purchaseOrderRepository->find($ids);
        $exportData = [];

        foreach ($purchaseOrders as $purchaseOrder) {
            $items = $this->getItems($purchaseOrder);

            $exportData[] = [
                'pay_status' => $purchaseOrder->pay_status_name,
                'number' => $purchaseOrder->number,
                'created' => date('Y/m/d', strtotime($purchaseOrder->created)),
                'delivery_number' => $purchaseOrder->delivery_number,
                'status' => $purchaseOrder->status_name,
                'items' => $items,
                'invoice_number' => $purchaseOrder->invoice_number,
                'fee' => $purchaseOrder->fee,
                'pay_method' => $purchaseOrder->pay_method_name,
                'recipient_name' => $purchaseOrder->recipient_name,
                'recipient_phone' => $purchaseOrder->recipient_phone,
                'email' => $purchaseOrder->email,
                'full_address' => $purchaseOrder->full_address,
                'remark' => $purchaseOrder->remark,
                'service_remark' => $purchaseOrder->service_remark,
                'returns_reason' => $purchaseOrder->returns_reason,
            ];
        }

        return $exportData;
    }

    private function getItems($purchaseOrder)
    {
        $items = [];
        foreach ($purchaseOrder->purchaseOrderProducts as $purchaseOrderProduct) {
            $item = $purchaseOrderProduct->product_name . '／';
            $quantity = 0;
            $attachedQuantity = 0;
            $attachedPrice = 0;
            foreach ($purchaseOrderProduct->purchaseOrderProductItems as $index => $purchaseOrderProductItem) {
                if ($index > 0) {
                    $item .= '、';
                }
                $itemPackQuantity = isset($purchaseOrderProductItem->productItem->item_quantity) ? $purchaseOrderProductItem->productItem->item_quantity : 1;
                $lastQuantity = $purchaseOrderProductItem->quantity * $itemPackQuantity;
                $item .= $purchaseOrderProductItem->productItem->number . '／' . $lastQuantity;
                if ($purchaseOrderProductItem->productItem->attached_id == 0) {
                    $quantity += $purchaseOrderProductItem->quantity;
                } else {
                    $attachedQuantity += $purchaseOrderProductItem->quantity;
                    $attachedPrice = $purchaseOrderProductItem->productItem->productAttached->price;
                }
            }
            $item .= '／' . ($attachedPrice * $attachedQuantity + \FeeHelper::calculateOrderPrice($purchaseOrderProduct, $quantity));
            $items[] = $item;
        }

        return implode('<br>', $items);
    }
}