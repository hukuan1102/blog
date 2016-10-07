<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table='users';//关联到user的表
    public function Infos(){
        return $this->hasMany('App\music','admin_id');
    }
    //
}
