<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.為了測試，先讓id可以設定，不然就是user_role table的key要另外設定
     *
     * @var array
     */
    protected $fillable = [
       'id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($check)
    {
        $roleArr = $this->roles->toArray();
        return in_array($check, array_pluck($roleArr, 'name'));
    }

    public function makeEmployee($title)
    {
        $assigned_roles = array();
        $roles = Role::all();

        switch ($title) {
            case Role::ADMIN:
                $assigned_roles[] = array_pluck($roles->where('name', Role::ADMIN)->toArray(), 'id');
                break;
            case Role::NORMAL_USER:
                $assigned_roles[] = array_pluck($roles->where('name', Role::NORMAL_USER)->toArray(), 'id');
                break;
            default:
                throw new \Exception("無此角色");
        }

        $this->roles()->attach($assigned_roles[0]);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role');
    }
}
