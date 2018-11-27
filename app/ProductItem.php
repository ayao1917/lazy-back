<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductItem
 * 
 * @property int $id
 * @property int $product_id
 * @property int $attached_id
 * @property string $number
 * @property string $name
 * @property int $quantity
 * @property int $item_quantity
 * @property int $status
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * @property int $original_quantity
 * @property string $int_bar_code
 * @property string $unit
 * @property string $type
 * @property int $cost
 * @property int $price
 * @property int $special_price
 * @property int $weight
 * @property int $spec_length
 * @property int $spec_width
 * @property int $spec_height
 * @property bool $constant_temp
 * @property bool $fragile
 * @property int $official_general_quantity
 * @property int $vendor_general_quantity
 * @property int $official_qc_quantity
 * @property int $vendor_qc_quantity
 * @property int $official_defect_quantity
 * @property int $vendor_defect_quantity
 * @property int $official_today_quantity
 * @property int $vendor_today_quantity
 * @property int $official_stock_quantity
 * @property int $vendor_stock_quantity
 * @property int $safe_stock_quantity
 * @property int $replenishment_quantity
 * @property int $purchase_cost
 * @property int $tally_cost
 * @property int $processing_cost
 * @property bool $is_multi_item
 * 
 * @property \Illuminate\Database\Eloquent\Collection $item_quantity_groups
 * @property \Illuminate\Database\Eloquent\Collection $item_quantity_maps
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_product_items
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_return_application_product_items
 *
 * @package App\Models
 */
class ProductItem extends Eloquent
{
	protected $table = 'product_item';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'product_id' => 'int',
		'attached_id' => 'int',
		'quantity' => 'int',
		'item_quantity' => 'int',
		'status' => 'int',
		'original_quantity' => 'int',
		'cost' => 'int',
		'price' => 'int',
		'special_price' => 'int',
		'weight' => 'int',
		'spec_length' => 'int',
		'spec_width' => 'int',
		'spec_height' => 'int',
		'constant_temp' => 'bool',
		'fragile' => 'bool',
		'official_general_quantity' => 'int',
		'vendor_general_quantity' => 'int',
		'official_qc_quantity' => 'int',
		'vendor_qc_quantity' => 'int',
		'official_defect_quantity' => 'int',
		'vendor_defect_quantity' => 'int',
		'official_today_quantity' => 'int',
		'vendor_today_quantity' => 'int',
		'official_stock_quantity' => 'int',
		'vendor_stock_quantity' => 'int',
		'safe_stock_quantity' => 'int',
		'replenishment_quantity' => 'int',
		'purchase_cost' => 'int',
		'tally_cost' => 'int',
		'processing_cost' => 'int',
		'is_multi_item' => 'bool'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'product_id',
		'attached_id',
		'number',
		'name',
		'quantity',
		'item_quantity',
		'status',
		'created',
		'modified',
		'original_quantity',
		'int_bar_code',
		'unit',
		'type',
		'cost',
		'price',
		'special_price',
		'weight',
		'spec_length',
		'spec_width',
		'spec_height',
		'constant_temp',
		'fragile',
		'official_general_quantity',
		'vendor_general_quantity',
		'official_qc_quantity',
		'vendor_qc_quantity',
		'official_defect_quantity',
		'vendor_defect_quantity',
		'official_today_quantity',
		'vendor_today_quantity',
		'official_stock_quantity',
		'vendor_stock_quantity',
		'safe_stock_quantity',
		'replenishment_quantity',
		'purchase_cost',
		'tally_cost',
		'processing_cost',
		'is_multi_item'
	];

	public function item_quantity_groups()
	{
		return $this->hasMany(\lazyworker\ItemQuantityGroup::class, 'parent_id');
	}

	public function product()
    {
        return $this->belongsTo(\lazyworker\Product::class);
    }

    public function product_attached()
    {
        return $this->belongsTo(\lazyworker\ProductAttached::class, 'attached_id');
    }
}
