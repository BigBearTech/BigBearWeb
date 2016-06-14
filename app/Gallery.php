<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function albums()
    {
    	return $this->hasMany(Album::class);
    }
}
