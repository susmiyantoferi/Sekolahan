<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\EmployeeLeave;
use Illuminate\Http\Request;

use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDF;


class EmployeeAttendanceController extends Controller
{
    public function AttendanceView()
    {
        $data['allData'] = EmployeeAttendance::orderBy('id', 'DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view', $data);
    }

    public function AttendanceAdd()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_add', $data);
    }

    public function AttendanceStore(Request $request){
        $countemploye = count($request->employee_id);

        for ($i=0; $i < $countemploye; $i++) { 
            $attend_status = 'attend_status'. $i;

            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();

        } //end for loop

        $notification = array(
            'message' => 'Employee Attendance Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('employee.attendance.view')->with($notification);
    }
}
