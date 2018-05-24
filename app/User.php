<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    public function statuses(){
        return $this->hasMany('App\Status');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
