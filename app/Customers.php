<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['email', 'city', 'state'];
    protected $table = 'customers';
}
