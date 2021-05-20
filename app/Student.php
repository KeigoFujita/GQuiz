<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = ['user_id', 'first_name', 'middle_name', 'last_name', 'lrn', 'gender', 'grade_level', 'status', 'strand_id', 'section_id'];

    public $percentage = 0;

    public static function active_students()
    {
        return Student::where('status', 'active')->get();
    }

    public static function selected_students($status = 'active')
    {
        return Student::where($status, 'active')->get();
    }

    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class);
    }


    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . " " .  $this->last_name;
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class);
    }

    public function getTwoInitialsAttribute()
    {
        return $this->first_name[0] . $this->last_name[0];
    }

    public function getColorAttribute()
    {
        $colors = ['#157A6E', '#499F68', '#587792', '#2E1F27', '#2C2C54', '#9EB25D', '#55505C', '#5A2A27', '#2D2D2A', '#C14953'];
        $rand_color = $colors[array_rand($colors)];
        return $rand_color;
    }

    public function getAdviserClearanceAttribute()
    {
        return AdviserClearance::where('student_id', $this->id)->get()->first();
    }


    public function getClassClearanceUpdateAttribute()
    {
        $percentage = 0;
        $class_clearances_count = ClassClearance::where('student_id', $this->id)->get()->count();
        $completed_classes_clearances_count = ClassClearance::where('student_id', $this->id)
            ->where('status', 'complete')->get()->count();

        try {
            $percentage = round(($completed_classes_clearances_count / $class_clearances_count) * 100);
            $this->percentage = $percentage;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $completed_classes_clearances_count . " / " . $class_clearances_count . " completed ( $percentage% )";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function department_requirements()
    {
        return $this->hasMany(DepartmentRequirement::class,'department_requirement_id');
    }

    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class, 'student_quiz')->withPivot('score');;
    }
}
