<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdviserClearance extends Model
{
    protected $fillable = ['student_id', 'status'];

    public function getStudentAttribute()
    {
        return Student::find($this->student_id);
    }
}