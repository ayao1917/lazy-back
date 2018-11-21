<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ItemQuantityMap
 * 
 * @property int $id
 * @property int $group_id
 * @property int $item_id
 * 
 * @property \App\Models\ItemQuantityGroup $item_quantity_group
 * @property \App\Models\ProductItem $product_item
 *
 * @package App\Models
 */
class ItemQuantityMap extends Eloquent
{
	protected $table = 'item_quantity_map';
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int',
		'item_id' => 'int'
	];

	protected $fillable = [
		'group_id',
		'item_id'
	];

	public function item_quantity_group()
	{
		return $this->belongsTo(\App\Models\ItemQuantityGroup::class, 'group_id');
	}

	public function product_item()
	{
		return $this->belongsTo(\App\Models\ProductItem::class, 'item_id');
	}
}
