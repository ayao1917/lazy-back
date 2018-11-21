<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductSubcategory
 * 
 * @property int $id
 * @property int $product_category_id
 * @property string $name
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\ProductCategory $product_category
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class ProductSubcategory extends Eloquent
{
	protected $table = 'product_subcategory';
	public $timestamps = false;

	protected $casts = [
		'product_category_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'product_category_id',
		'name',
		'created',
		'modified'
	];

	public function product_category()
	{
		return $this->belongsTo(\App\Models\ProductCategory::class);
	}

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class);
	}
}
