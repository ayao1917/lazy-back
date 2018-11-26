<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Discount
 * 
 * @property int $id
 * @property string $name
 * @property string $photo
 * @property bool $is_published
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Discount extends Eloquent
{
	protected $table = 'discount';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'is_published' => 'bool'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'name',
		'photo',
		'is_published',
		'created',
		'modified'
	];

	public function products()
	{
		return $this->hasMany(\lazyworker\Product::class);
	}
}
