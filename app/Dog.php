<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $fillable = ['name', 'food'];
    public function getParent()//名字可以任意取
    {
        //第二個參數要對應xxable方法exit
        return $this->morphMany(Pet::class,'petable');
    }
}
