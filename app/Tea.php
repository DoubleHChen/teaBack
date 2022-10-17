<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tea extends Model
{
    protected $table = 'tea';
    public $timestamps = false;
    protected $primaryKey = ['name','oldprice','newprice','img'];
    public $incrementing = false;
}
