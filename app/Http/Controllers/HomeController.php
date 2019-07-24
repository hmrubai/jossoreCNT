<?php

namespace App\Http\Controllers;

use App\Visitor;
use App\Employee;
use App\EmployeeLog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //50833 nohup port
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all()->count();
        $visitors = Visitor::all()->count();
        $employee_log = EmployeeLog::all()->count();
        return view('home', compact('employee_log', 'employees', 'visitors'));
    }
}
