<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['email', 'city', 'state', 'phone'];
    protected $table = 'customers';
}
