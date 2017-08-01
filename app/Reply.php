<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $guarded = [];

    public function owner(){
        return $this->belongsTo('App\User', 'user_id'); //need to explicit that foreignKey is called user_id not owner id.
    }
}
