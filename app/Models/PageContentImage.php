<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PageContentImage
 * 
 * @property int $id
 * @property int $page_id
 * @property string $photo
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\Page $page
 *
 * @package App\Models
 */
class PageContentImage extends Eloquent
{
	protected $table = 'page_content_image';
	public $timestamps = false;

	protected $casts = [
		'page_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'page_id',
		'photo',
		'created',
		'modified'
	];

	public function page()
	{
		return $this->belongsTo(\App\Models\Page::class);
	}
}
