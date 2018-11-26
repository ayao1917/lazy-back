<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SeoInfo
 * 
 * @property int $id
 * @property int $relate_id
 * @property int $type
 * @property string $path
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $heading_tag
 * @property string $sub_heading_tag
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 *
 * @package App\Models
 */
class SeoInfo extends Eloquent
{
	protected $table = 'seo_info';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $casts = [
		'relate_id' => 'int',
		'type' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'relate_id',
		'type',
		'path',
		'title',
		'description',
		'keywords',
		'heading_tag',
		'sub_heading_tag',
		'created',
		'modified'
	];
}
