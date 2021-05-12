<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/migrate',function(){
    Artisan::call('migrate:fresh --seed');
    return redirect(route('dashboard.index'));
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    //Dashboard
    Route::resource('dashboard','DashboardController');

    Route::resource('semesters', 'SemesterController');
    Route::resource('employees', 'EmployeeController');


    Route::resource('roles', 'RoleController')->except(['update']);;
    Route::put('roles/update', 'RoleController@update')->name('roles.update');

    //Department
    Route::delete('departments/destroy', 'DepartmentController@destroy')->name('departments.destroy');
    Route::get('departments/search', 'DepartmentController@search')->name('departments.search');
    Route::put('department/update', 'DepartmentController@update')->name('departments.update');
    Route::post('departments/assign-officer', 'AssignOfficerController')->name('assign_officer');
    Route::resource('departments', 'DepartmentController')->except(['update', 'destroy']);

    Route::resource('strands', 'StrandController');
    Route::resource('teachers', 'TeacherController');


    Route::get('/sections/{section}/clearance/print','SectionController@printClearance')->name('sections.clearance.print');
    Route::get('/sections/{section}/clearance/pdf','SectionController@clearanceToPDF')->name('sections.clearance.pdf');
    Route::get('/sections/{section}/clearance','SectionController@clearance')->name('sections.clearance');
    Route::resource('sections', 'SectionController');

    Route::get('/students/{student}/clearance/print','StudentController@printClearance')->name('students.clearance.print');
    Route::get('/students/{student}/clearance/pdf','StudentController@clearanceToPDF')->name('students.clearance.pdf');
    Route::get('/students/{student}/clearance','StudentController@clearance')->name('students.clearance');
    Route::resource('students', 'StudentController');

    Route::resource('subjects', 'SubjectController');
    Route::resource('users', 'UserController');


    //Teachers
    Route::get('teacher/{employee}/my-students/', 'TeacherController@my_students')->name('teachers.MyStudents');
    Route::get('teacher/{employee}/my-classes/', 'TeacherController@my_classes')->name('teachers.MyClasses');
    Route::get('teacher/my-classes/{class}', 'TeacherController@school_class')->name('teachers.schoolClass');


    //Department Heads
    Route::get('department-head/{employee}', 'DepartmentController@department_head')->name('departments.department_head');



    //Classes
    Route::resource('classes', 'SchoolClassController',[
        'names' => 'schoolClass'
    ]);

    Route::resource('classRequirements', 'ClassRequirementController');
    Route::resource('departmentRequirements', 'DepartmentRequirementController');


    //For DepartmentRequirements
    Route::put('departmentRequirements/update', 'DepartmentRequirementController@update')->name('departmentRequirements.update');
    Route::delete('departmentRequirements/delete', 'ClassRequirementController@destroy')->name('departmentRequirements.destroy');



    //For class Requirements
    Route::put('classRequirements/update', 'ClassRequirementController@update_requirement')->name('classRequirements.update_requirement');
    Route::delete('classRequirements/delete', 'ClassRequirementController@destroy')->name('classRequirements.destroy');
    Route::get('class-requirements/{classRequirement}/clearance/', 'ClassRequirementController@show')->name('classRequirements.show');


    //for class Clearance
    Route::post('classClearance/update', 'ClassClearanceController@update')->name('classClearance.update');
    Route::post('classClearance/makeAllComplete', 'ClassClearanceController@makeAllComplete')->name('classClearance.makeAllComplete');
    Route::post('classClearance/makeAllUnComplete', 'ClassClearanceController@makeAllUnComplete')->name('classClearance.makeAllUnComplete');



    //for department Clearance
    Route::get('department-requirement/{departmentRequirement}/clearance/', 'DepartmentController@clearances')->name('departments.clearances');
    Route::post('departmentClearance/updateClearance', 'DepartmentController@update_clearance')->name('departments.updateClearance');
    Route::post('departmentClearance/{departmentRequirement}/makeAllComplete', 'DepartmentController@makeAllComplete')->name('departmentClearance.makeAllComplete');
    Route::post('departmentClearance/{departmentRequirement}/makeAllUnComplete', 'DepartmentController@makeAllUnComplete')->name('departmentClearance.makeAllUnComplete');



    //for adviser Clearance
    Route::get('sections/{section}/clearances', 'SectionController@clearances')->name('sections.clearances');
    Route::post('sections/clearances/updateClearance', 'SectionController@update_clearance')->name('sections.updateClearance');
    Route::post('sections/clearances/makeAllComplete', 'SectionController@makeAllComplete')->name('sections.makeAllComplete');
    Route::post('sections/clearances/makeAllUnComplete', 'SectionController@makeAllUnComplete')->name('sections.makeAllUnComplete');



    Route::get('getsection', 'StudentController@getsection')->name('students.getsection');
    Route::get('/assignClassView/{section}', 'SectionController@assign_class_view')->name('sections.assign_class_view');
    Route::post('/removeAssignClass', 'SectionController@remove_assign_class')->name('sections.remove_assign_class');
    Route::post('/assignClass', 'SectionController@assign_class')->name('sections.assign_class');




    Route::get('active-sections', 'SectionController@active_sections')->name('sections.activeSections');
    Route::post('addActiveSection', 'SectionController@add_active_sections')->name('sections.addActiveSection');
    Route::get('showActiveSection/{section_teacher_semester}', 'SectionController@show_active_section')->name('sections.showActiveSection');
    Route::post('editActiveSection/{section_teacher_semester}', 'SectionController@edit_active_section')->name('sections.editActiveSection');



    // Newly Added
    Route::post('addStudent', 'SectionController@addStudent')->name('sections.addstudent');
    Route::post('addStudentToSection', 'SectionController@addStudentToSection')->name('students.add_student_to_section');
});