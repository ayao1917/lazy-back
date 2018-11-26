<?php

namespace lazyworker\Repositories;

use lazyworker\Models\PurchaseOrder;

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
}