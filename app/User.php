<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Faker\Provider\Uuid;

class User extends Authenticatable
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
   /* public function setUuid() {
    	$this->attributes['uuid'] = Uuid::uuid();
    }*/
}
