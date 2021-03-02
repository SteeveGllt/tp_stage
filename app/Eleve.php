<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    public function users()
    {
        return $this->hasOne('App\User');
    }
    public function stages()
    {
        return $this->belongsToMany('App\Stage');
    }
}
