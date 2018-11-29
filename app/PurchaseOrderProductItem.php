<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PurchaseOrderProductItem
 * 
 * @property int $id
 * @property int $purchase_order_product_id
 * @property int $product_item_id
 * @property string $product_item_name
 * @property int $quantity
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \lazyworker\PurchaseOrderProduct $purchase_order_product
 * @property \lazyworker\ProductItem $product_item
 *
 * @package App\Models
 */
class PurchaseOrderProductItem extends Eloquent
{
	protected $table = 'purchase_order_product_item';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'purchase_order_product_id' => 'int',
		'product_item_id' => 'int',
		'quantity' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'purchase_order_product_id',
		'product_item_id',
		'product_item_name',
		'quantity',
		'created',
		'modified'
	];

	public function purchase_order_product()
	{
		return $this->belongsTo(\lazyworker\PurchaseOrderProduct::class);
	}

	public function productItem()
	{
		return $this->belongsTo(\lazyworker\ProductItem::class);
	}
}
