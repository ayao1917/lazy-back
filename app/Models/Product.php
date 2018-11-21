<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property int $product_subcategory_id
 * @property int $discount_id
 * @property int $product_template
 * @property string $description
 * @property string $content
 * @property string $marketing_wording
 * @property string $photo
 * @property int $sale_target
 * @property bool $is_one_page
 * @property int $is_brand_website
 * @property bool $is_published
 * @property int $status
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * @property int $sale_rate
 * @property int $quantity
 * @property string $pageAlias
 * @property string $tag
 * 
 * @property \App\Models\ProductSubcategory $product_subcategory
 * @property \App\Models\Discount $discount
 * @property \Illuminate\Database\Eloquent\Collection $product_addons
 * @property \Illuminate\Database\Eloquent\Collection $product_attacheds
 * @property \Illuminate\Database\Eloquent\Collection $product_content_images
 * @property \Illuminate\Database\Eloquent\Collection $product_programs
 * @property \Illuminate\Database\Eloquent\Collection $product_relates
 * @property \Illuminate\Database\Eloquent\Collection $purchase_orders
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_return_applications
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	protected $table = 'product';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'product_subcategory_id' => 'int',
		'discount_id' => 'int',
		'product_template' => 'int',
		'sale_target' => 'int',
		'is_one_page' => 'bool',
		'is_brand_website' => 'int',
		'is_published' => 'bool',
		'status' => 'int',
		'sale_rate' => 'int',
		'quantity' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'name',
		'product_subcategory_id',
		'discount_id',
		'product_template',
		'description',
		'content',
		'marketing_wording',
		'photo',
		'sale_target',
		'is_one_page',
		'is_brand_website',
		'is_published',
		'status',
		'created',
		'modified',
		'sale_rate',
		'quantity',
		'pageAlias',
		'tag'
	];

	public function product_subcategory()
	{
		return $this->belongsTo(\App\Models\ProductSubcategory::class);
	}

	public function discount()
	{
		return $this->belongsTo(\App\Models\Discount::class);
	}

	public function product_addons()
	{
		return $this->hasMany(\App\Models\ProductAddon::class, 'addon_product_id');
	}

	public function product_attacheds()
	{
		return $this->hasMany(\App\Models\ProductAttached::class);
	}

	public function product_content_images()
	{
		return $this->hasMany(\App\Models\ProductContentImage::class);
	}

	public function product_programs()
	{
		return $this->hasMany(\App\Models\ProductProgram::class);
	}

	public function product_relates()
	{
		return $this->hasMany(\App\Models\ProductRelate::class, 'relate_product_id');
	}

	public function purchase_orders()
	{
		return $this->belongsToMany(\App\Models\PurchaseOrder::class, 'purchase_order_product')
					->withPivot('id', 'product_name', 'price', 'special_price', 'fee', 'created', 'modified');
	}

	public function purchase_order_return_applications()
	{
		return $this->belongsToMany(\App\Models\PurchaseOrderReturnApplication::class, 'purchase_order_return_application_product')
					->withPivot('id', 'product_name', 'price', 'special_price', 'fee', 'created', 'modified');
	}
}
