<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    public $timestamps = false;
    protected $primaryKey = ['user','pwd'];
    public $incrementing = false;
}
