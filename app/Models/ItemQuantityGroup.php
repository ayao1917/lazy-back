<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ItemQuantityGroup
 * 
 * @property int $id
 * @property int $quantity
 * @property int $parent_id
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\ProductItem $product_item
 * @property \Illuminate\Database\Eloquent\Collection $item_quantity_maps
 *
 * @package App\Models
 */
class ItemQuantityGroup extends Eloquent
{
	protected $table = 'item_quantity_group';
	public $timestamps = false;

	protected $casts = [
		'quantity' => 'int',
		'parent_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'quantity',
		'parent_id',
		'created',
		'modified'
	];

	public function product_item()
	{
		return $this->belongsTo(\App\Models\ProductItem::class, 'parent_id');
	}

	public function item_quantity_maps()
	{
		return $this->hasMany(\App\Models\ItemQuantityMap::class, 'group_id');
	}
}
