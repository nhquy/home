<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  /**
  * The table associated with the model.
  *
  * @var string
  */
 protected $table = "contents";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'title', 'locale', 'field_body',
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
