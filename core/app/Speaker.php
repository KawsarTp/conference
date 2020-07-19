<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $guarded = [];


    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
