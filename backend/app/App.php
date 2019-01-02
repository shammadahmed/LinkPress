<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table = 'app';

    protected $fillable = ['name', 'description', 'disqus', 'ad'];
}
