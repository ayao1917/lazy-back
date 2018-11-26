<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductCategory
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $product_subcategories
 *
 * @package App\Models
 */
class ProductCategory extends Eloquent
{
	protected $table = 'product_category';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'name',
		'created',
		'modified'
	];

	public function product_subcategories()
	{
		return $this->hasMany(\lazyworker\ProductSubcategory::class);
	}
}
