<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
