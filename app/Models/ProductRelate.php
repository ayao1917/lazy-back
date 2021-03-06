<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductRelate
 * 
 * @property int $id
 * @property int $product_id
 * @property int $relate_product_id
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class ProductRelate extends Eloquent
{
	protected $table = 'product_relate';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'relate_product_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'relate_product_id'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class, 'relate_product_id');
	}
}
