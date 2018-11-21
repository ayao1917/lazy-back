<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 * 
 * @property int $id
 * @property int $product_id
 * @property string $title
 * @property string $content
 * @property string $author
 * @property \Carbon\Carbon $publish_date
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $blog_content_images
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
	protected $table = 'blog';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int'
	];

	protected $dates = [
		'publish_date',
		'created',
		'modified'
	];

	protected $fillable = [
		'product_id',
		'title',
		'content',
		'author',
		'publish_date',
		'created',
		'modified'
	];

	public function blog_content_images()
	{
		return $this->hasMany(\App\Models\BlogContentImage::class);
	}
}
