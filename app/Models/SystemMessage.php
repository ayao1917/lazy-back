<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SystemMessage
 * 
 * @property int $id
 * @property int $type
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 *
 * @package App\Models
 */
class SystemMessage extends Eloquent
{
	protected $table = 'system_message';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'type',
		'title',
		'content',
		'created',
		'modified'
	];
}
