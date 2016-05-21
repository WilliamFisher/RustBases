<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
	protected $fillable = [ 'title', 'shortdescription', 'description', 'imageurl' ];
    /**
     * Get the user that created the base.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
