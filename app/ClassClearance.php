<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassClearance extends Model
{
    protected $fillable = ['student_id', 'class_requirement_id', 'status'];

    public function getStudentAttribute()
    {
        return Student::find($this->student_id);
    }

    public function getClassRequirementAttribute()
    {
        return ClassRequirement::find($this->class_requirement_id);
    }
}