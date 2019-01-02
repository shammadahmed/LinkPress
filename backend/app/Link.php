<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{	
	protected $fillable = ['url', 'hash', 'title', 'description', 'image'];

	public function getDescriptionAttribute($value)
	{
		if(!$value)
		{
			return 'Not description';
		}

		return $value;
	}

    public function keywords()
    {
    	return $this->belongsToMany('App\Keyword');
    }
}