<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeLog;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {}

    public function addEmployee()
    {

        return view('addEmployee');
    }
    
    public function employeeLogList()
    {
        $employees = Employee::select('id', 'employee_id', 'name', 'phone')->orderBy('name', 'ASC')->get();
        $employee_log = EmployeeLog::select('employee_logs.id', 'employee_logs.log_date', 'employee_logs.log_in_time', 'employee_logs.log_out_time', 'employees.name', 'employees.phone', 'employees.designation', 'employees.picture')
        ->leftjoin('employees', 'employees.id', '=', 'employee_logs.employee_id')->orderBy('employee_logs.log_date', 'ASC')->get();

        return view('employeeLogList', compact('employee_log', 'employees'));
    }

    public function employeeLogDetails()
    {
        $employees = Employee::select('id', 'employee_id', 'name', 'phone')->orderBy('name', 'ASC')->get();
        return view('employeeLogDetails', compact('employees'));
    }

    public function LogDetails(Request $request)
    {
        $employee_log = EmployeeLog::select('employee_logs.id', 'employee_logs.log_date', 'employee_logs.log_in_time', 'employee_logs.log_out_time', 'employees.name', 'employees.phone', 'employees.designation', 'employees.picture')
        ->where('employee_logs.employee_id', $request->employee_id)
        ->whereBetween('employee_logs.log_date',array($request->start_date,$request->end_date))
        ->leftjoin('employees', 'employees.id', '=', 'employee_logs.employee_id')->orderBy('employee_logs.log_date', 'ASC')->get();
        
        return response()->json($employee_log);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id'       => 'required',
            'employee_name'     => 'required',
            'employee_phone'    => 'required',
        ]);

        $addEmployee = new Employee();
        $addEmployee->employee_id   = $request->employee_id;
        $addEmployee->name          = $request->employee_name;
        $addEmployee->email         = $request->employee_email;
        $addEmployee->phone         = $request->employee_phone;
        $addEmployee->address       = $request->employee_address;
        $addEmployee->joining_date  = date("Y-m-d", strtotime($request->employee_joining_date));
        $addEmployee->department    = $request->employee_department;
        $addEmployee->designation   = $request->employee_designation;
        
        if($request->picture){
            $profile  =  'profile_'.time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('files/employee/profile'), $profile);
        }else{ $profile  = ""; }

        $addEmployee->picture = $profile;

        if($request->fingure_print){
            $fingureprint  =  'fingureprint_'.time().'.'.$request->fingure_print->getClientOriginalExtension();
            $request->fingure_print->move(public_path('files/employee/fingureprint'), $fingureprint);
        }else{ $fingureprint  = ""; }

        $addEmployee->fingure_print = $fingureprint;
        $addEmployee->save();

        return redirect()->action('EmployeeController@addEmployee')->with('success', "The Employee has been added successfully!");
    }

    public function show(Employee $employee)
    {
        $employees = Employee::all();
        return view('employeeList', compact('employees'));
    }

    public function addEmployeeLog(Request $request)
    {
        $getLogInformation = EmployeeLog::where('employee_id', $request->employee_id)->where('log_date', $request->log_date)->get();
        
        if(count($getLogInformation))
        {
            $log_id = $getLogInformation[0]->id;

            $log_update = EmployeeLog::find($log_id);
            $log_update->log_in_time = $request->in_time;
            $log_update->log_out_time = $request->out_time;
            $log_update->save();
            return $log_update->id;
        }
        else
        {
            $addEmployeeLog = new EmployeeLog();
            $addEmployeeLog->employee_id = $request->employee_id;
            $addEmployeeLog->log_date = $request->log_date;
            $addEmployeeLog->log_in_time = $request->in_time;
            $addEmployeeLog->log_out_time = $request->out_time;
            $addEmployeeLog->save();
            return $addEmployeeLog->id;
        }
        return true;
    }

    public function updateEmployeeLog(Request $request)
    {
        $log_update = EmployeeLog::find($request->log_id);
        $log_update->log_in_time = $request->in_time;
        $log_update->log_out_time = $request->out_time;
        $log_update->save();
        return $log_update->id;
    }

    public function edit(Employee $employee)
    {}

    public function update(Request $request, Employee $employee)
    {}

    public function destroy(Employee $employee)
    {}
}
