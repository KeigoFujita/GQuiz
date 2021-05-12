<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role_name', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_role');
    }

    public function getAssignedOfficerAttribute()
    {
        return $this->employees->first();
    }
}