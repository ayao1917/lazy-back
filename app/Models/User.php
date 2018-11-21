<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 09:47:17 +0000.
 */

namespace lazyworker\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $phone
 * @property string $city
 * @property string $region
 * @property string $address
 * @property string $email
 * @property \Carbon\Carbon $birthday
 * @property bool $gender
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $purchase_orders
 * @property \Illuminate\Database\Eloquent\Collection $purchase_order_return_applications
 * @property \Illuminate\Database\Eloquent\Collection $user_messages
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $table = 'user';
	public $timestamps = false;

	protected $casts = [
		'gender' => 'bool'
	];

	protected $dates = [
		'birthday',
		'created',
		'modified'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'name',
		'phone',
		'city',
		'region',
		'address',
		'email',
		'birthday',
		'gender',
		'created',
		'modified'
	];

	public function purchase_orders()
	{
		return $this->hasMany(\App\Models\PurchaseOrder::class);
	}

	public function purchase_order_return_applications()
	{
		return $this->hasMany(\App\Models\PurchaseOrderReturnApplication::class);
	}

	public function user_messages()
	{
		return $this->hasMany(\App\Models\UserMessage::class);
	}
}
