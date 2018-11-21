<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductContentImage
 * 
 * @property int $id
 * @property int $product_id
 * @property string $photo
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class ProductContentImage extends Eloquent
{
	protected $table = 'product_content_image';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'product_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'product_id',
		'photo',
		'created',
		'modified'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
