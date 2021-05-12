<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRequirement extends Model
{
    protected $fillable = ['school_class_id', 'requirement', 'requirement_description', 'deadline', 'school_classes_id'];

    public function school_class()
    {
        return $this->belongsTo(SchoolClass::class, 'school_classes_id');
    }

    public function getClearancesAttribute()
    {
        $clearances = ClassClearance::where('class_requirement_id', $this->id)->get();
        return $clearances;
    }

    public function getClearancesCountAttribute()
    {
        $clearances_count = ClassClearance::where('class_requirement_id', $this->id)->count();
        return $clearances_count;
    }

    public function getCompletedClearancesAttribute()
    {
        $clearances = ClassClearance::where('class_requirement_id', $this->id)->where('status', 'complete')->get();
        return $clearances;
    }

    public function getCompletedClearancesCountAttribute()
    {
        $clearances_count = ClassClearance::where('class_requirement_id', $this->id)->where('status', 'complete')->count();
        return $clearances_count;
    }

    public function getPercentageAttribute()
    {
        $percentage = 0;

        try {
            $percentage = ($this->completed_clearances_count/  $this->clearances_count) * 100;
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $percentage;
    }
}