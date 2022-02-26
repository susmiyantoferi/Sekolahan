<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeSalaryController extends Controller
{
    public function SalaryView()
    {
        $data['allData'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view', $data);
    }

    public function SalaryIncrement($id)
    {
        $data['increment'] = User::find($id);
        return view('backend.employee.employee_salary.employee_salary_increment', $data);
    }

    public function SalaryIncrementStore(Request $request, $id)
    {
        //insert in table user
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        //insert in table employee_salary_logs
        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
        $salaryData->save();


        $notification = array(
            'message' => 'Employee Salary Increment Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('employee.salary.view')->with($notification);
    }

    public function SalaryDetails($id)
    {
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id', $data['details']->id)->get();
        // dd($data['salary_log']->toArray());

        return view('backend.employee.employee_salary.employee_salary_details', $data);
    }
}
