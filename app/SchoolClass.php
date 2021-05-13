<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = ['class_code', 'employee_id', 'subject_id', 'schedule'];


    public function getEmployeeAttribute()
    {
        return Employee::find($this->employee_id);
    }

    public function getSubjectAttribute()
    {
        return Subject::find($this->subject_id);
    }


    public function sections()
    {
        return $this->belongsToMany(Section::class, 'class_section');
    }

    public function class_requirements()
    {
        return $this->hasMany(ClassRequirement::class, 'school_classes_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}