<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupsPermissions extends Model
{
    /**
  	* The table associated with the model.
  	*
  	* @var string
  	*/
 	protected $table = "groups_permissions";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'group_id', 'permission_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];
    
    public function groups(){
    	return $this->hasMany(Groups::class);
    }
    
    public function permissions(){
    	return $this->belongsTo(Permissions::class);
    }
}
