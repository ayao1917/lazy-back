<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $username
 * @property string $password
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * @property string $email
 * 
 * @property \Illuminate\Database\Eloquent\Collection $system_logs
 *
 * @package App\Models
 */
class Admin extends Eloquent
{
	protected $table = 'admin';
    public $timestamps = true;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $dates = [
		'created',
		'modified'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'created',
		'modified',
		'email'
	];

	public function system_logs()
	{
		return $this->hasMany(\App\Models\SystemLog::class);
	}
}
