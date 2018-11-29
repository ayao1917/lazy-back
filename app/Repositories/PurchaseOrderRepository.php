<?php

namespace lazyworker\Repositories;

use Illuminate\Support\Facades\DB;
use lazyworker\PurchaseOrder;

class PurchaseOrderRepository
{
    /** @var PurchaseOrder inject PurchaseOrder model */
    protected $purchaseOrder;

    /**
     * PurchaseOrderRepository constructor.
     * @param PurchaseOrder $purchaseOrder
     */
    public function __construct(PurchaseOrder $purchaseOrder)
    {
        $this->purchaseOrder = $purchaseOrder;
    }

    public function create($attributes)
    {
        return $this->purchaseOrder->create($attributes);
    }

    public function all()
    {
        return $this->purchaseOrder->all();
    }

    public function find($id)
    {
        return $this->purchaseOrder->find($id);
    }

    public function update($id, array $attributes)
    {
        return $this->purchaseOrder->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->purchaseOrder->find($id)->delete();
    }

    public function getFromIdsAsExport($ids)
    {
        return PurchaseOrder::select(
            'pay_status',
            'number',
            'created',
            'delivery_number',
            'status',
            DB::raw("'' AS items"),
            'invoice_number',
            'fee',
            'pay_method',
            'recipient_name',
            'recipient_phone',
            'email',
            DB::raw("CONCAT(COALESCE(recipient_city, ''), COALESCE(recipient_region, ''), COALESCE(recipient_address, '')) AS full_address"),
            'remark',
            'service_remark',
            'returns_reason')->whereIn('id', $ids)->get();
    }
}