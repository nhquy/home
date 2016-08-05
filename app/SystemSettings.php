<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemSettings extends Model
{
  /**
  * The table associated with the model.
  *
  * @var string
  */
 protected $table = "systemsettings";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'category', 'settings',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];
}
