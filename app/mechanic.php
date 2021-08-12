<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mechanic extends Model
{
    protected $fillable = ['name','email','phone','lat','long'];
}
