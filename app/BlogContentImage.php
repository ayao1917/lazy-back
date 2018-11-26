<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BlogContentImage
 * 
 * @property int $id
 * @property int $blog_id
 * @property string $photo
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\Blog $blog
 *
 * @package App\Models
 */
class BlogContentImage extends Eloquent
{
	protected $table = 'blog_content_image';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'blog_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'blog_id',
		'photo',
		'created',
		'modified'
	];

	public function blog()
	{
		return $this->belongsTo(\lazyworker\Blog::class);
	}
}
