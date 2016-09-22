<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const NORMAL_USER = 'normal';
    const ADMIN = 'admin';

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_role');
    }

    public $timestamps = false;


}