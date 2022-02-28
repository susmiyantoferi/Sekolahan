<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\EmployeeLeave;
use Illuminate\Http\Request;

use App\Models\EmployeeSalaryLog;
use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDF;


class EmployeeLeaveController extends Controller
{
    public function LeaveView()
    {
        $data['allData'] = EmployeeLeave::orderBy('id', 'desc')->get();
        return view('backend.employee.employee_leave.employee_leave_view', $data);
    }

    public function LeaveAdd()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_add', $data);
    }
}