<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/semesters';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function redirectTo()
    {
        $user = Auth::user();

        //dd($user);
        if (isset($user)) {

            if ($user->role == 'student') {
                return route('students.show', $user->student->id);
            } else {

                if ($user->employee->is_teacher) {
                    return  route('teachers.my-classes', $user->employee);
                } else if ($user->employee->is_registrar) {
                    return '/dashboard';
                } else {
                    return  route('departments.department_head', $user->employee);
                }
            }
        }
    }
}
