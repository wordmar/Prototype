<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name', 'food', 'showfear'];
    public function getParent()//名字可以任意取
    {
        //第二個參數要對應xxable方法
        return $this->morphMany(Pet::class,'petable');
    }

    public function showFear()
    {
        return "processing business rule:".$this->showfear;
    }
}
