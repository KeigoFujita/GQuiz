<?php

namespace App\Http\Controllers;

use App\AdviserClearance;
use App\ClassClearance;
use App\Department;
use App\DepartmentClearance;
use App\DepartmentRequirement;
use App\Employee;
use App\Http\Requests\SectionStoreRequest;
use App\Http\Requests\SectionUpdateRequest;
use App\Role;
use App\SchoolClass;
use App\Section;
use App\SectionTeacherSemester;
use App\Semester;
use App\Strand;
use App\Student;
use App\StudentSectionSemester;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('section.index')->with('sections', Section::withCount('students','school_classes')->with('employee','strand')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();
        $teachers = $employee->teachers();

        return view('section.create')->with([
            'strands' => Strand::all(),
            'teachers' => $teachers,
            'classes' => SchoolClass::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionStoreRequest $request)
    {

        $request->flash();
        $section = Section::create([
            'section_name' => $request->section_name,
            'grade_level' => $request->grade_level,
            'strand_id' => $request->strand_id
        ]);

        $section->employee()->associate($request->employee_id);
        $section->save();
        session()->flash('success', 'Section created successfully.');
        return redirect(route('sections.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view('section.show')->with('section', $section);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $employee = new Employee();
        $teachers = $employee->teachers();

        return view('section.edit')->with([
            'section' => $section,
            'strands' => Strand::all(),
            'teachers' => $teachers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectionUpdateRequest $request, Section $section)
    {
        $request->flash();
        $section->fill([
            'section_name' => $request->section_name,
            'grade_level' => $request->grade_level,
            'strand_id' => $request->strand_id
        ]);

        $section->employee()->associate($request->employee_id);
        $section->save();
        session()->flash('success', 'Section updated successfully.');
        return redirect(route('sections.show', $section));
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


    public function active_sections()
    {
        // $employee = new Employee();
        // $teachers = $employee->teachers();
        // $section_teacher_semester = new SectionTeacherSemester();
        // $activeSections = $section_teacher_semester->active_sections;
        // $available_sections = $section_teacher_semester->available_sections;

        // return view('section.active_section')->with('activeSections', $activeSections)->with('teachers', $teachers)->with('available_sections', $available_sections);
    }

    public function assign_class_view(Request $request, Section $section)
    {

        $assigned_classes = $section->school_classes;
        $not_assigned_classes = $section->not_assigned_classes;

        return view('section.assign_class')->with([

            'assigned_classes' => $assigned_classes,
            'not_assigned_classes' => $not_assigned_classes,
            'section' => $section
        ]);
    }


    public function assign_class(Request $request)
    {


        // dd($request->class_id);
        $section = Section::find($request->section_id);

        $section->school_classes()->attach($request->class_id);

        $section->save();
        // dd($section->school_classes);
        return redirect(route('sections.assign_class_view', $section));
    }

    public function remove_assign_class(Request $request)
    {


        $section = Section::find($request->section_id);
        $section->school_classes()->detach($request->class_id);
        $section->save();
        // dd($section->school_classes);
        return redirect(route('sections.assign_class_view', $section));
    }


    public function clearances(Request $request, Section $section)
    {

        return view('section.clearances')->with([
            'section' => $section
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_clearance(Request $request)
    {

        $clearance_id = $request->clearance_id;
        $status = $request->status;

        $clearance = AdviserClearance::find($clearance_id);
        $clearance->status = $status;
        $clearance->save();

        //echo "$clearance_id" . "| $status";

        return response('Updated Successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makeAllComplete(Request $request)
    {
        $section = Section::find($request->section_id);
        $ids = $request->ids_to_complete;
        $array = explode(',', $ids);


        $class_clearances_to_update = AdviserClearance::whereIn('id', $array)
            ->update([
                'status' => 'complete'
            ]);

        // dd($class_clearances_to_update);
        // User::where('id', 24)->update (dataAssociativeArray) ;

        //  dd($request->all());

        return redirect(route('sections.clearances', $section));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makeAllUnComplete(Request $request)
    {
        $section = Section::find($request->section_id);
        $ids = $request->ids_to_uncomplete;
        $array = explode(',', $ids);

        //dd($request->all());
        $class_clearances_to_update = AdviserClearance::whereIn('id', $array)
            ->update([
                'status' => 'incomplete'
            ]);

        // dd($class_clearances_to_update);
        // User::where('id', 24)->update (dataAssociativeArray) ;

        //  dd($request->all());
        // route('departments.clearances', )
        return redirect(route('sections.clearances', $section));
    }

    public function clearance(Section $section)
    {   

        $departments = Department::with('role')->get()->except(1)->map(function($department){
            $department_requirements = DepartmentRequirement::where('department_id',$department->id)->get();
            $department->department_requirements = $department_requirements;
            return $department;
        });

        $classes = $section->school_classes;

        $students = $section->students->map(function($student) use ($departments, $classes){
            
            $department_clearances = [];

            foreach ($departments as $department) {
                
                $clearance = [
                    'id'=> $department->id,
                    'department_name'=>$department->department_name,
                    'lecturer'=>$department->role->assigned_officer->full_name,
                    'status'=> 'complete',
                    'completion_date'=>'N/A'
                ];

                foreach ($department->department_requirements as $requirement) {

                    $no_of_incomplete = DepartmentClearance::where('student_id',$student->id)
                    ->where('department_requirement_id',$requirement->id)
                    ->where('status','incomplete')
                    ->count();
                    $clearance['status'] = $no_of_incomplete == 0 ? 'complete' : 'incomplete';
    
                    $completion_date = DepartmentClearance::where('department_requirement_id',$requirement->id)
                    ->where('student_id',$student->id)
                    ->max('updated_at');
                    $clearance['completion_date'] = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
                    
                }

                if($department->department_requirements->count() == 0) {
                    $clearance['status'] = 'complete';
                    $clearance['completion_date'] =  now()->format('m-d-Y');
                }
                array_push($department_clearances, $clearance);
            }

            $adviser_clearance = AdviserClearance::where('student_id',$student->id)->first();

            $subject_clearances = $classes->map(function($class) use ($student){
                $requirements = $class->class_requirements;
                $requirements->each(function($requirement) use ($class, $student){
                    $no_of_incomplete = ClassClearance::where('student_id',$student->id)
                    ->where('class_requirement_id',$requirement->id)
                    ->where('status','incomplete')
                    ->count();
    
                    $class->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';
    
                    $completion_date = ClassClearance::where('class_requirement_id',$requirement->id)
                    ->where('student_id',$student->id)
                    ->max('updated_at');
                    $class->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
                });
                if($requirements->count() == 0) {
                    $class->status = 'complete';
                    $class->completion_date =  now()->format('m-d-Y');
                }
                return $class;
            });

            $student->department_clearances = $department_clearances;
            $student->adviser_clearance = $adviser_clearance;
            $student->subject_clearances = $subject_clearances;

            return $student;
        });
        


        $registrar = Role::where('role_name','registrar')->first();
        $registrar_name = "N/A";
        if(isset($registrar)){
            $registrar_name = $registrar->assigned_officer->full_name;
        }
        return view('section.clearance')
            ->with('students',$students)
            ->with('registrar_name',$registrar_name)
            ->with('section',$section);
    }

    public function clearanceToPDF(Section $section)
    {   
        $students = $section->students->map(function($student){

            $department_clearances = Department::with('role')->get()->except(1)->map(function($department) use ($student){
                $department_requirements = DepartmentRequirement::where('department_id',$department->id)->get();
                $department_requirements->map(function($requirement) use ($student, $department){
                    $no_of_incomplete = DepartmentClearance::where('student_id',$student->id)
                    ->where('department_requirement_id',$requirement->id)
                    ->where('status','incomplete')
                    ->count();
                    $department->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';
    
                    $completion_date = DepartmentClearance::where('department_requirement_id',$requirement->id)
                    ->where('student_id',$student->id)
                    ->max('updated_at');
                    $department->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
    
                });
                if($department_requirements->count() == 0) {
                    $department->status = 'complete';
                    $department->completion_date =  now()->format('m-d-Y');
                }
                return $department;
            });
            
            $adviser_clearance = AdviserClearance::where('student_id',$student->id)->first();
    
            $subject_clearances = $student->section->school_classes->map(function($class) use ($student){
                $requirements = $class->class_requirements;
                $requirements->each(function($requirement) use ($class, $student){
                    $no_of_incomplete = ClassClearance::where('student_id',$student->id)
                    ->where('class_requirement_id',$requirement->id)
                    ->where('status','incomplete')
                    ->count();
    
                    $class->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';
    
                    $completion_date = ClassClearance::where('class_requirement_id',$requirement->id)
                    ->where('student_id',$student->id)
                    ->max('updated_at');
                    $class->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
                });
                if($requirements->count() == 0) {
                    $class->status = 'complete';
                    $class->completion_date =  now()->format('m-d-Y');
                }
                return $class;
            });

            $student->department_clearances = $department_clearances;
            $student->adviser_clearance = $adviser_clearance;
            $student->subject_clearances = $subject_clearances;

            return $student;
        });

        $registrar = Role::where('role_name','registrar')->first();
        $registrar_name = "N/A";
        if(isset($registrar)){
            $registrar_name = $registrar->assigned_officer->full_name;
        }
        
         $pdf = PDF::loadView('section.clearance-pdf',[
             'students'=>$students,
             'registrar_name'=>$registrar_name,
         ]);

         return $pdf->download(strtoupper($section->section_name). ' - CLEARANCES'.'.pdf');
    }

    public function printClearance(Section $section)
    {   
        $students = $section->students->map(function($student){
            $department_clearances = Department::with('role')->get()->except(1)->map(function($department) use ($student){
                $department_requirements = DepartmentRequirement::where('department_id',$department->id)->get();
                $department_requirements->map(function($requirement) use ($student, $department){
                    $no_of_incomplete = DepartmentClearance::where('student_id',$student->id)
                    ->where('department_requirement_id',$requirement->id)
                    ->where('status','incomplete')
                    ->count();
                    $department->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';
    
                    $completion_date = DepartmentClearance::where('department_requirement_id',$requirement->id)
                    ->where('student_id',$student->id)
                    ->max('updated_at');
                    $department->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
    
                });
                if($department_requirements->count() == 0) {
                    $department->status = 'complete';
                    $department->completion_date =  now()->format('m-d-Y');
                }
                return $department;
            });
            
            $adviser_clearance = AdviserClearance::where('student_id',$student->id)->first();
    
            $subject_clearances = $student->section->school_classes->map(function($class) use ($student){
                $requirements = $class->class_requirements;
                $requirements->each(function($requirement) use ($class, $student){
                    $no_of_incomplete = ClassClearance::where('student_id',$student->id)
                    ->where('class_requirement_id',$requirement->id)
                    ->where('status','incomplete')
                    ->count();
    
                    $class->status = $no_of_incomplete == 0 ? 'complete' : 'incomplete';
    
                    $completion_date = ClassClearance::where('class_requirement_id',$requirement->id)
                    ->where('student_id',$student->id)
                    ->max('updated_at');
                    $class->completion_date = $no_of_incomplete == 0 ? Carbon::parse($completion_date)->format('m-d-Y') : 'N/A' ;
                });
                if($requirements->count() == 0) {
                    $class->status = 'complete';
                    $class->completion_date =  now()->format('m-d-Y');
                }
                return $class;
            });

            $student->department_clearances = $department_clearances;
            $student->adviser_clearance = $adviser_clearance;
            $student->subject_clearances = $subject_clearances;

            return $student;
        });

        $registrar = Role::where('role_name','registrar')->first();
        $registrar_name = "N/A";
        if(isset($registrar)){
            $registrar_name = $registrar->assigned_officer->full_name;
        }
        
         $pdf = PDF::loadView('section.clearance-pdf',[
             'students'=>$students,
             'registrar_name'=>$registrar_name,
         ]);

         return $pdf->stream(strtoupper($section->section_name). ' - CLEARANCES'.'.pdf');
    }


}