<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PurchaseOrder
 * 
 * @property int $id
 * @property int $user_id
 * @property int $purchase_order_id
 * @property string $number
 * @property string $recipient_name
 * @property bool $recipient_gender
 * @property string $recipient_phone
 * @property string $recipient_city
 * @property string $recipient_region
 * @property string $recipient_address
 * @property int $pay_method
 * @property int $fee
 * @property string $email
 * @property string $vat_number
 * @property string $remark
 * @property string $service_remark
 * @property string $pay_remark
 * @property string $returns_reason
 * @property string $invoice_number
 * @property int $invoice_status
 * @property \Carbon\Carbon $invoice_date
 * @property string $delivery_number
 * @property int $status
 * @property int $pay_status
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * @property string $system_remark
 * @property string $batch_number
 * @property int $shipping_cost
 * @property int $reverse_logistics_cost
 * @property string $shop_rid
 * @property string $shop_click_id
 * 
 * @property \lazyworker\User $user
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_extra_fees
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_return_applications
 *
 * @package App\Models
 */
class PurchaseOrder extends Eloquent
{
    const STATUS = [
        100 => '新訂單', 101 => '訂單確認中', 102 => '待出貨', 103 => '已出貨', 104 => '已到貨', 105 => '已開立發票', 198 => '開立異常', 199 => '上傳失敗',
        200 => '退貨確認中', 201 => '退貨確認', 202 => '退貨中', 203 => '已退貨', 204 => '拒收', 205 => '退款中', 206 => '已退款', 299 => '上傳失敗',
        300 => '換貨確認中', 301 => '換貨確認', 302 => '換貨中', 303 => '已換貨', 399 => '上傳失敗',
        400 => '已取消', 401 => '延遲出貨', 402 => '取消確認中',
        500 => '交易完成',
        600 => '換貨單',
    ];

    const PAY_STATUS = [
        0 => '未付款', 1 => '付款確認中', 2 => '已付款'
    ];

    const PAY_METHOD = [
        0 => '貨到付款', 1 => '信用卡付款'
    ];

    const INVOICE_ERROR_MESSAGE = [
        'M0' => 'XML 格式錯誤',
        'M1' => 'XML 格式錯誤',
        'D0' => '沒有產品明細',
        'A1' => '上傳失敗',
        'A2' => '所有折讓金額加總不能大於原發票金額',
        'A3' => '發票號碼不存在',
        'A4' => '發票號碼已經被作廢',
        'A5' => '折讓單已上傳',
        'A6' => '折讓總金額須大於零',
        'S1' => '資料庫發生錯誤',
        'S2' => '訂單日期超過開立日期',
        'S3' => '未在申報範圍內',
        'S4' => '未取得發票號碼',
        'S5' => '發票號碼已使用完畢',
        'S6' => '超過租賃張數限制',
        'S7' => '訂單號碼已存在',
        'S8' => '開立的總金額為負值',
        'C1' => '資料庫發生錯誤',
        'C2' => '資料有誤',
        'C3' => '該發票已過申報期間，需填入核准作廢文號',
        'C4' => '無此發票號碼可以作廢',
        'C5' => '該發票已經作廢過',
        'C6' => '該發票已經折讓，無法作廢',
        'TaxType9' => '混合課稅別別限收銀機發票',
        'Invalid' => '無效IP，請通知系統商',
    ];

    const INVOICE_STATUS = [
        100 => '未開立', 105 => '已開立發票', 106 => '已作廢', 107 => '已折讓', 198 => '開立異常'
    ];

	protected $table = 'purchase_order';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'user_id' => 'int',
		'purchase_order_id' => 'int',
		'recipient_gender' => 'bool',
		'pay_method' => 'int',
		'fee' => 'int',
		'invoice_status' => 'int',
		'status' => 'int',
		'pay_status' => 'int',
		'shipping_cost' => 'int',
		'reverse_logistics_cost' => 'int'
	];

	protected $dates = [
		'invoice_date',
		'created',
		'modified'
	];

	protected $fillable = [
		'user_id',
		'purchase_order_id',
		'number',
		'recipient_name',
		'recipient_gender',
		'recipient_phone',
		'recipient_city',
		'recipient_region',
		'recipient_address',
		'pay_method',
		'fee',
		'email',
		'vat_number',
		'remark',
		'service_remark',
		'pay_remark',
		'returns_reason',
		'invoice_number',
		'invoice_status',
		'invoice_date',
		'delivery_number',
		'status',
		'pay_status',
		'created',
		'modified',
		'system_remark',
		'batch_number',
		'shipping_cost',
		'reverse_logistics_cost',
		'shop_rid',
		'shop_click_id'
	];

	public function user()
	{
		return $this->belongsTo(\lazyworker\User::class);
	}

	public function purchase_order_extra_fees()
	{
		return $this->hasMany(\lazyworker\PurchaseOrderExtraFee::class, 'order_id');
	}

	public function purchaseOrderProducts()
	{
		return $this->hasMany(\lazyworker\PurchaseOrderProduct::class, 'purchase_order_id', 'id');
	}

	public function purchase_order_return_applications()
	{
		return $this->hasMany(\lazyworker\PurchaseOrderReturnApplication::class, 'purchase_order_replacement_id');
	}

	public function replacement_purchase_orders()
    {
        return $this->hasMany(\lazyworker\PurchaseOrder::class, 'purchase_order_id');
    }

    public function getPayStatusNameAttribute()
    {
	    return isset(self::PAY_STATUS[$this->pay_status]) ? self::PAY_STATUS[$this->pay_status] : $this->pay_status;
    }

    public function getStatusNameAttribute()
    {
        return isset(self::STATUS[$this->status]) ? self::STATUS[$this->status] : $this->status;
    }

    public function getPayMethodNameAttribute()
    {
        return isset(self::PAY_METHOD[$this->pay_method]) ? self::PAY_METHOD[$this->pay_method] : $this->pay_method;
    }

    public function getFullAddressAttribute()
    {
	    return (isset($this->recipient_city) ? $this->recipient_city : '') .
            (isset($this->recipient_region) ? $this->recipient_region : '') .
            (isset($this->recipient_address) ? $this->recipient_address : '');
    }

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
