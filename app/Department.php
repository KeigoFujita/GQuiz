<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['department_name'];


    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function department_requirements()
    {
        return $this->hasMany(DepartmentRequirement::class);
    }
}