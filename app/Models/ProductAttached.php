<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductAttached
 * 
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $description
 * @property string $marketing_wording
 * @property string $photo
 * @property int $price
 * @property int $sale_target
 * @property int $sale_rate
 * @property int $quantity
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class ProductAttached extends Eloquent
{
	protected $table = 'product_attached';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'price' => 'int',
		'sale_target' => 'int',
		'sale_rate' => 'int',
		'quantity' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'product_id',
		'name',
		'description',
		'marketing_wording',
		'photo',
		'price',
		'sale_target',
		'sale_rate',
		'quantity',
		'created',
		'modified'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
