<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentRequirement extends Model
{
    protected $fillable = ['department_id', 'requirement', 'requirement_description', 'deadline'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getDepartmentClearancesAttribute()
    {
        return DepartmentClearance::with('student')->where('department_requirement_id', $this->id)->get();
    }

    public function getDepartmentClearancesCountAttribute()
    {
        return DepartmentClearance::with('student')->where('department_requirement_id', $this->id)->count();
    }

    public function getCompletedDepartmentClearancesAttribute()
    {
        return DepartmentClearance::where('department_requirement_id', $this->id)
            ->where('status', 'complete')
            ->get();
    }

    public function getCompletedDepartmentClearancesCountAttribute()
    {
        return DepartmentClearance::where('department_requirement_id', $this->id)
            ->where('status', 'complete')
            ->count();
    }

    public function getPercentageAttribute()
    {
        $percentage = 0;
        $students_count = Student::count();
        $completed_department_clearances_count = $this->completed_department_clearances_count;

        try {
            $percentage = ($completed_department_clearances_count / $students_count) * 100;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $percentage;
    }
}