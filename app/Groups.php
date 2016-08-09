<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    /**
  	* The table associated with the model.
  	*
  	* @var string
  	*/
 	protected $table = "groups";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name', 'description', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];
    
    public function permissions()
    {
    	return $this->hasMany(Permissions::class);
    }
}
