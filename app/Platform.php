<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = ['iframe_youtube', 'app_name'];
    protected $table = 'platform';
}
