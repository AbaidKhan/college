<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Subject extends Model
{
    public function session()
    {
        return $this->hasOne(Session::class,'id','session_id');
    }
}
