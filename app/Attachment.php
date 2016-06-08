<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'exif' => 'array',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
