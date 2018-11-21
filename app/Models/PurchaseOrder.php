<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

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
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_extra_fees
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_return_applications
 *
 * @package App\Models
 */
class PurchaseOrder extends Eloquent
{
	protected $table = 'purchase_order';
	public $timestamps = false;

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
		return $this->belongsTo(\App\Models\User::class);
	}

	public function purchase_order_extra_fees()
	{
		return $this->hasMany(\App\Models\PurchaseOrderExtraFee::class, 'order_id');
	}

	public function products()
	{
		return $this->belongsToMany(\App\Models\Product::class, 'purchase_order_product')
					->withPivot('id', 'product_name', 'price', 'special_price', 'fee', 'created', 'modified');
	}

	public function purchase_order_return_applications()
	{
		return $this->hasMany(\App\Models\PurchaseOrderReturnApplication::class, 'purchase_order_replacement_id');
	}
}
