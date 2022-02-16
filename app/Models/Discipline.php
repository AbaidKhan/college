<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    public function shift()
    {
        return $this->hasOne(Shift::class,'id','shift_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function subjects()
    {
        return $this->hasMany(DisciplineSubject::class,'discipline_id','id');
    }
}
