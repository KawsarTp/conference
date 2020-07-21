<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorshipApplication extends Model
{
    protected $table = 'sponsorship_applications';


    public function types()
    {
        return $this->belongsTo(SponsorType::class,'sponsor_type_id');
    }
}
