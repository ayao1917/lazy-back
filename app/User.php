<?php

namespace lazyworker;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function purchase_orders()
    {
        return $this->hasMany(\lazyworker\Models\PurchaseOrder::class);
    }

    public function purchase_order_return_applications()
    {
        return $this->hasMany(\lazyworker\Models\PurchaseOrderReturnApplication::class);
    }

    public function user_messages()
    {
        return $this->hasMany(\lazyworker\Models\UserMessage::class);
    }
}
