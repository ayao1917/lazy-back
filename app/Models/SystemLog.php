<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SystemLog
 * 
 * @property int $id
 * @property int $admin_id
 * @property string $table_class
 * @property int $foreign_id
 * @property int $type
 * @property string $message
 * @property bool $is_resolved
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\Admin $admin
 *
 * @package App\Models
 */
class SystemLog extends Eloquent
{
	protected $table = 'system_log';
	public $timestamps = false;

	protected $casts = [
		'admin_id' => 'int',
		'foreign_id' => 'int',
		'type' => 'int',
		'is_resolved' => 'bool'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'admin_id',
		'table_class',
		'foreign_id',
		'type',
		'message',
		'is_resolved',
		'created',
		'modified'
	];

	public function admin()
	{
		return $this->belongsTo(\App\Models\Admin::class);
	}
}
