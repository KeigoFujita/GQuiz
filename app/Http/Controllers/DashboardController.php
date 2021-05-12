<?php

namespace App\Http\Controllers;

use App\ClassClearance;
use App\Department;
use App\DepartmentClearance;
use App\DepartmentRequirement;
use App\Employee;
use App\SchoolClass;
use App\Section;
use App\Strand;
use App\Student;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //COUNT
         $student_count = Student::count();

         $teacher_count = Employee::where(function($query){
            $query->whereHas('roles',function($subquery){
                $subquery->where('roles.role_name','teacher');
            });
         })->count();

         $section_count = Section::count();
         $class_count = SchoolClass::count();

        //DAILY CLEARANCE COMPLETED
        $period = collect(CarbonPeriod::create(now()->subDays(14), now() )->toArray());
        $days = $period->map(function($date){
            return $date->format('Y-m-d');
        });

        $department_clearances_per_day = $days->map(function($day){
            $count = DepartmentClearance::where('updated_at','>=',Carbon::parse($day))->where('updated_at','<',Carbon::parse($day)->addDays(1))->count();
            return $count;
        })->toArray();

        $class_clearances_per_day = $days->map(function($day){
            $count = ClassClearance::where('updated_at','>=',Carbon::parse($day))->where('updated_at','<',Carbon::parse($day)->addDays(1))->count();
            return $count;
        })->toArray();

        $daily_clearance_data = [
            'days' => $days,
            'class_clearance' => $class_clearances_per_day,
            'department_clearance'=> $department_clearances_per_day
        ];
        //STUDENTS BY GRADE LEVEL
        $students_by_grade_level = [Student::where('grade_level','11')->count(),Student::where('grade_level','12')->count()];
        

        //STRANDS
        $strands = Strand::select('strand_name')->orderBy('id')->get()->map(fn($strand) => $strand->strand_name)->toArray();
        $students_per_strand = Student::select(DB::raw('count(*) as total'))->groupBy('strand_id')->orderBy('strand_id')->get()->map(fn($students) => $students->total)->toArray();

        $students_per_strand_colors = ['#7CA82B','#EF8535','#C191E1','#29A2CC','#D31E1E','#00527B'];
        $students_by_strand_data = [$strands,$students_per_strand,$students_per_strand_colors];


        //DEPARTMENT CLEARANCES
        $department_requirements = DepartmentRequirement::orderBy('created_at')->take(5)->get();

        //DEPARTMENTS
        $departments = Department::all()->except(1)->take(5); // EXCEPT BECAUSE OF N/A DEPARTMENT FOR TEACHERS

        return view('dashboard.index')
            ->with('student_count',$student_count)
            ->with('teacher_count',$teacher_count)
            ->with('section_count',$section_count)
            ->with('class_count',$class_count)
            ->with('daily_clearance_data',$daily_clearance_data)
            ->with('students_by_grade_level',$students_by_grade_level)
            ->with('students_by_strand',$students_by_strand_data)
            ->with('department_requirements', $department_requirements)
            ->with('departments', $departments)
            ->with('classes', SchoolClass::orderBy('schedule')->take(6)->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
