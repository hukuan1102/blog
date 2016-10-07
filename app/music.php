<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class music extends Model
{
    //
    protected $table='imusic';//关联到imusic这个表。
    public function admins(){
        return $this->blongsTo('App\Administrator','admin_id');
    }
}
