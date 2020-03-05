<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metrics extends Model
{
    protected $fillable = ['views'];
    protected $table = 'metrics';
}
