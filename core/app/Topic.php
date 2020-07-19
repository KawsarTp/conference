<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = [];


    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}
