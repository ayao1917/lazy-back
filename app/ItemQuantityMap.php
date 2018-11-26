<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ItemQuantityMap
 * 
 * @property int $id
 * @property int $group_id
 * @property int $item_id
 * 
 * @property \lazyworker\ItemQuantityGroup $item_quantity_group
 * @property \lazyworker\ProductItem $product_item
 *
 * @package App\Models
 */
class ItemQuantityMap extends Eloquent
{
	protected $table = 'item_quantity_map';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

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
		return $this->belongsTo(\lazyworker\ItemQuantityGroup::class, 'group_id');
	}

	public function product_item()
	{
		return $this->belongsTo(\lazyworker\ProductItem::class, 'item_id');
	}
}
