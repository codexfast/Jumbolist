<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['id','initials', 'city', 'list', 'unit','pendent'];
    protected $table = 'units';
}
