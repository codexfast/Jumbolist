<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $guarded = ['amount', 'link'];
    protected $fillable = ['id', 'amount', 'link'];
    protected $table = 'donate';
    
}
