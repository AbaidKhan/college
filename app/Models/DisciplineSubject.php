<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineSubject extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->hasOne(Subject::class,'id','subject_id');
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class,'discipline_id','id');
    }

}
