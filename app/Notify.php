<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $fillable = ['customer_id', 'pendent'];
    protected $table = 'notify';
}
