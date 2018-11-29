<?php

namespace lazyworker\Exports;

use lazyworker\Services\PurchaseOrderService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrdersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /** @var  PurchaseOrderService inject PurchaseOrderService */
    protected $purchaseOrderService;
    protected $ids;

    public function __construct(PurchaseOrderService $purchaseOrderService, Array $ids)
    {
        $this->purchaseOrderService = $purchaseOrderService;
        $this->ids = $ids;
    }

    public function headings(): array
    {
        return [
            '付款狀態',
            '訂單編號',
            '訂購時間',
            '運送單號',
            '訂單狀態',
            '品項／料號／數量／金額',
            '發票號碼',
            '總金額',
            '運送方式',
            '收件人姓名',
            '收件人電話',
            '信箱',
            '收件人地址',
            '備註',
            '客服備註',
            '退換貨原因',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->purchaseOrderService->export($this->ids));
    }
}
