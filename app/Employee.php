<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'mobile_number', 'gender', 'user_id','status'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'employee_role');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function getStudentsAttribute()
    {
        $my_students = collect([]);

        foreach ($this->sections as $key => $section) {
            foreach ($section->students as $key => $student) {
                $my_students->add($student);
            }
        }

        // foreach ($this->school_classes as $key => $class) {
        //     foreach ($class->students as $key => $student) {
        //         $my_students->add($student);
        //     }
        // }


        // dd($my_students);
        return $my_students;
    }


    public function getSchoolClassesAttribute()
    {
        return SchoolClass::where('employee_id', $this->id)->get();
    }

    public function hasRole($roleId)
    {
        // dd($this->roles->pluck('id')->toArray());
        return in_array($roleId, $this->roles->pluck('id')->toArray());
    }
    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getIsTeacherAttribute()
    {

        foreach ($this->roles as $key => $role) {
            if ($role->role_name == 'Teacher') {
                return true;
            }
        }

        return false;
    }

    public function getIsRegistrarAttribute()
    {

        foreach ($this->roles as $key => $role) {
            if ($role->role_name == 'Registrar') {
                return true;
            }
        }

        return false;
    }


    public static function teachers()
    {

        $teachers = Employee::where('status','active')->with('roles')->whereHas('roles', function ($query) {
            $teacher = Role::where('role_name', 'teacher')->first();
            $teacher_id = $teacher->id;
            $query->where('role_id', $teacher_id);
        })->get();
        return $teachers;
    }


    //Attributes
    public function getColorAttribute()
    {
        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];
        $rand_color = $colors[array_rand($colors)];
        return $rand_color;
    }

    public function getTwoInitialsAttribute()
    {
        return $this->first_name[0] . $this->last_name[0];
    }

    public function user()
    {
        return $this->belongsTO(User::class);
    }
}