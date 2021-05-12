<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->role == 'student') {
            return redirect(route('students.show', Auth::user()->student));
        }else if (Auth::user()->employee->is_teacher) {
            return redirect(route('teachers.my-classes'));
        }

        return redirect(route('dashboard.index'));
    }
}