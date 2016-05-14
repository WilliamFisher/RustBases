<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    /**
     * Get the user that created the base.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
