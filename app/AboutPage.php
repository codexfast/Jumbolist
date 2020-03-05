<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = ['title', 'large_text'];
    protected $table = 'about_page';
}
