<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Home
 * 
 * @property int $id
 * @property string $photo
 * @property string $url
 * @property int $type
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 *
 * @package App\Models
 */
class Home extends Eloquent
{
	protected $table = 'home';
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
		'photo',
		'url',
		'type',
		'created',
		'modified'
	];
}
