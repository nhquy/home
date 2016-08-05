<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locales extends Model
{
    /**
  * The table associated with the model.
  *
  * @var string
  */
 protected $table = "locales";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name', 'locale', 'sort_order',
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
