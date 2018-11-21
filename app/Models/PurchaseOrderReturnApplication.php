<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PurchaseOrderReturnApplication
 * 
 * @property int $id
 * @property int $purchase_order_id
 * @property int $user_id
 * @property int $purchase_order_replacement_id
 * @property int $type
 * @property string $number
 * @property string $fb_name
 * @property string $reason
 * @property string $bank_name
 * @property string $bank_branch
 * @property string $bank_account
 * @property string $account_name
 * @property string $bank_info
 * @property string $photo
 * @property int $fee
 * @property string $recipient_name
 * @property string $recipient_phone
 * @property string $recipient_city
 * @property string $recipient_region
 * @property string $recipient_address
 * @property string $delivery_number
 * @property int $invoice_action
 * @property int $debit_fee
 * @property string $debit_reason
 * @property bool $is_modify_info
 * @property int $status
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\PurchaseOrder $purchase_order
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class PurchaseOrderReturnApplication extends Eloquent
{
	protected $table = 'purchase_order_return_application';
	public $timestamps = false;

	protected $casts = [
		'purchase_order_id' => 'int',
		'user_id' => 'int',
		'purchase_order_replacement_id' => 'int',
		'type' => 'int',
		'fee' => 'int',
		'invoice_action' => 'int',
		'debit_fee' => 'int',
		'is_modify_info' => 'bool',
		'status' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'purchase_order_id',
		'user_id',
		'purchase_order_replacement_id',
		'type',
		'number',
		'fb_name',
		'reason',
		'bank_name',
		'bank_branch',
		'bank_account',
		'account_name',
		'bank_info',
		'photo',
		'fee',
		'recipient_name',
		'recipient_phone',
		'recipient_city',
		'recipient_region',
		'recipient_address',
		'delivery_number',
		'invoice_action',
		'debit_fee',
		'debit_reason',
		'is_modify_info',
		'status',
		'created',
		'modified'
	];

	public function purchase_order()
	{
		return $this->belongsTo(\App\Models\PurchaseOrder::class, 'purchase_order_replacement_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function products()
	{
		return $this->belongsToMany(\App\Models\Product::class, 'purchase_order_return_application_product')
					->withPivot('id', 'product_name', 'price', 'special_price', 'fee', 'created', 'modified');
	}
}
