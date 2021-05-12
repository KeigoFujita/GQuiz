<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentClearance extends Model
{
    protected $fillable =  ['student_id', 'department_requirement_id', 'status'];


    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function getDepartmentRequirementAttribute()
    {
        return DepartmentRequirement::find($this->department_requirement_id);
    }

    public function getDepartmentRequirementCountAttribute()
    {
        return DepartmentRequirement::find($this->department_requirement_id)->count();
    }

    public function getDepartmentAttribute()
    {
        return $this->department_requirement->department;
    }

    public function display_status()
    {
        return $this->status == 'incomplete' ? "Incomplete" : "Completed";
    }

    public static function getDepartmentClearance(Student $student)
    {
        $clearances = DepartmentClearance::where('student_id', $student->id)->get();
        return $clearances;
    }
}