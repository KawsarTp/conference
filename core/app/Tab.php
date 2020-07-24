<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    protected $guarded = [];


    protected $casts = ['content'=>'json'];
}
