<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductAddon
 * 
 * @property int $id
 * @property int $product_id
 * @property int $addon_product_id
 * 
 * @property \lazyworker\Product $product
 *
 * @package App\Models
 */
class ProductAddon extends Eloquent
{
	protected $table = 'product_addon';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'product_id' => 'int',
		'addon_product_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'addon_product_id'
	];

	public function product()
	{
		return $this->belongsTo(\lazyworker\Product::class, 'addon_product_id');
	}
}
