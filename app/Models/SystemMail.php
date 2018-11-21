<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SystemMail
 * 
 * @property int $id
 * @property string $name
 * @property string $value
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 *
 * @package App\Models
 */
class SystemMail extends Eloquent
{
	protected $table = 'system_mail';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'name',
		'value',
		'created',
		'modified'
	];
}
