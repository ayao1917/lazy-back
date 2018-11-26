<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Page
 * 
 * @property int $id
 * @property string $title
 * @property int $type
 * @property string $content
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $page_content_images
 *
 * @package App\Models
 */
class Page extends Eloquent
{
	protected $table = 'page';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'type' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'title',
		'type',
		'content',
		'created',
		'modified'
	];

	public function page_content_images()
	{
		return $this->hasMany(\lazyworker\PageContentImage::class);
	}
}
