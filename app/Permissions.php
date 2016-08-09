<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = "permissions";
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'uuid', 'name', 'text', 'source'
	];
	
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	*/
	protected $hidden = [
			//'password', 'remember_token',
	];
	
	public function groups()
	{
		return $this->hasMany(Groups::class);
	}
}
