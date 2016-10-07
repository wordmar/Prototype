<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['language'];
    public function petable()//名稱要與CreatePetsTable中的petable_id及petable_type名字一樣
    {
        return $this->morphTo();
    }
 }
