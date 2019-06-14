<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bedrijf extends Model
{
    protected $fillable = [
        'naam',
        'email',
        'logo',
        'website'
    ];
}
