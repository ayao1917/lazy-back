<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductProgram
 * 
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property int $quantity
 * @property int $price
 * @property bool $is_free_shipping
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class ProductProgram extends Eloquent
{
	protected $table = 'product_program';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'quantity' => 'int',
		'price' => 'int',
		'is_free_shipping' => 'bool'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'product_id',
		'name',
		'quantity',
		'price',
		'is_free_shipping',
		'created',
		'modified'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
