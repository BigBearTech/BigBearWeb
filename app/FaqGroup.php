<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqGroup extends Model
{
    /**
     *	Since I couldm't do a real name for the table
     *	Ill have to manually use the table name
     */
    protected $table = 'faq_groups';

    /**
     *	Faq Group belongs to User model
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
