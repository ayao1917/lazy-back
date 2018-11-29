<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PurchaseOrderProduct
 * 
 * @property int $id
 * @property int $purchase_order_id
 * @property int $product_id
 * @property string $product_name
 * @property int $price
 * @property int $special_price
 * @property int $fee
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \lazyworker\PurchaseOrder $purchase_order
 * @property \lazyworker\Product $product
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_product_items
 *
 * @package App\Models
 */
class PurchaseOrderProduct extends Eloquent
{
	protected $table = 'purchase_order_product';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'purchase_order_id' => 'int',
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
		'purchase_order_id',
		'product_id',
		'product_name',
		'price',
		'special_price',
		'fee',
		'created',
		'modified'
	];

	public function purchase_order()
	{
		return $this->belongsTo(\lazyworker\PurchaseOrder::class, 'id', 'purchase_order_id');
	}

	public function product()
	{
		return $this->belongsTo(\lazyworker\Product::class);
	}

	public function purchaseOrderProductItems()
	{
		return $this->hasMany(\lazyworker\PurchaseOrderProductItem::class, 'purchase_order_product_id', 'id');
	}
}
