<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserMessage
 * 
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property int $type
 * @property string $message
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class UserMessage extends Eloquent
{
	protected $table = 'user_message';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'type' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'user_id',
		'title',
		'type',
		'message',
		'created',
		'modified'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
