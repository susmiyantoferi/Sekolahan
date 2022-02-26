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
}
