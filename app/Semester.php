<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['semester_code', 'semester', 'start_year', 'end_year', 'start_date', 'end_date', 'status'];

    public function getSchoolYearAttribute()
    {
        return $this->start_year . " - " . $this->end_year;
    }

    public function getHasLatestSemesterAttribute()
    {
        return Semester::where('status', 'ongoing')->get()->count() == 1;
    }

    public function getLatestSemesterCodeAttribute()
    {
        $latest_semester = Semester::where('status', 'ongoing')->get()->first();
        $semester_code =  $latest_semester->semester_code;
        return $semester_code;
    }

    public static function current_semester_code()
    {
        if (Semester::where('status', 'ongoing')->get()->count() == 1) {
            $latest_semester = Semester::where('status', 'ongoing')->get()->first();
            $semester_code =  $latest_semester->semester_code;
            return $semester_code;
        }

        return "null";
    }

    public static function latest_semester_code()
    {

        $has_ongoing_semester =  Semester::where('status', 'ongoing')->get()->count() == 1;

        if ($has_ongoing_semester) {
            $latest_semester = Semester::where('status', 'ongoing')->get()->first();
            $semester_code =  $latest_semester->semester_code;
            return $semester_code;
        }
        return "null";
    }
}