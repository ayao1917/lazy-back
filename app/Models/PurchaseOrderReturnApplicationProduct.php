<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PurchaseOrderReturnApplicationProduct
 * 
 * @property int $id
 * @property int $purchase_order_return_application_id
 * @property int $product_id
 * @property string $product_name
 * @property int $price
 * @property int $special_price
 * @property int $fee
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\PurchaseOrderReturnApplication $purchase_order_return_application
 * @property \App\Models\Product $product
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_return_application_product_items
 *
 * @package App\Models
 */
class PurchaseOrderReturnApplicationProduct extends Eloquent
{
	protected $table = 'purchase_order_return_application_product';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'purchase_order_return_application_id' => 'int',
		'product_id' => 'int',
		'price' => 'int',
		'special_price' => 'int',
		'fee' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'purchase_order_return_application_id',
		'product_id',
		'product_name',
		'price',
		'special_price',
		'fee',
		'created',
		'modified'
	];

	public function purchase_order_return_application()
	{
		return $this->belongsTo(\App\Models\PurchaseOrderReturnApplication::class);
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}

	public function purchase_order_return_application_product_items()
	{
		return $this->hasMany(\App\Models\PurchaseOrderReturnApplicationProductItem::class);
	}
}
