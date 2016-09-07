<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  /**
  * The table associated with the model.
  *
  * @var string
  */
 protected $table = "menu";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'title', 'alias', 'menu_type', 'link', 'note',
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
