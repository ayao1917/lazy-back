<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PurchaseOrderExtraFee
 * 
 * @property int $id
 * @property int $order_id
 * @property int $type
 * @property string $name
 * @property int $fee
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\PurchaseOrder $purchase_order
 *
 * @package App\Models
 */
class PurchaseOrderExtraFee extends Eloquent
{
	protected $table = 'purchase_order_extra_fee';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'order_id' => 'int',
		'type' => 'int',
		'fee' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'order_id',
		'type',
		'name',
		'fee',
		'created',
		'modified'
	];

	public function purchase_order()
	{
		return $this->belongsTo(\App\Models\PurchaseOrder::class, 'order_id');
	}
}
