<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{

    protected $fillable = ['section_name', 'grade_level', 'employee_id', 'strand_id'];

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function students() : HasMany
    {
        return $this->hasMany(Student::class);
    }


    public function getAdviserAttribute()
    {
        return $this->employee;
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class);
    }

    public function school_classes()
    {
        return $this->belongsToMany(SchoolClass::class, 'class_section');
    }

    public function getNotAssignedClassesAttribute()
    {

        $exception = $this->school_classes->pluck('id')->toArray();
        $not_assigned_classes = SchoolClass::whereNotIn('id', $exception)->get();

        // dd($not_assigned_classes);
        return $not_assigned_classes;
    }
}
