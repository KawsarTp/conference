<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorType extends Model
{
    protected $table = 'sponsor_types';


    public function application()
    {
        return $this->hasMany(SponsorshipApplication::class);
    }
}
