<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    protected $fillable = ['initials', 'city', 'list', 'unity'];
    protected $table = 'unity';
}
