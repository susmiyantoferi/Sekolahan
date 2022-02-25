<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\Designation;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\EmployeeSalaryLog;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeRegistController extends Controller
{
    public function EmployeeView()
    {
        $data['allData'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_regist.employee_view', $data);
    }

    public function EmployeeAdd()
    {
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_regist.employee_add', $data);
    }

    public function EmployeeStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $checkYear = date('Ym', strtotime($request->join_date));
            // dd($checkYear);
            $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first();

            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            } else {
                $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            } //end else

            //insert in table users
            $final_id_no =  $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->f_name = $request->f_name;
            $user->m_name = $request->m_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->join_date = date('Y-m-d', strtotime($request->join_date));

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            //insert in table employee_salary_logs
            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();
        });

        $notification = array(
            'message' => 'Employee Registration Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('employee.registration.view')->with($notification);
    }


    public function EmployeeEdit($id)
    {
        $data['editData'] = User::find($id);
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_regist.employee_edit', $data);
    }

    public function EmployeeUpdate(Request $request, $id)
    {

        //insert in table users
        $user = User::find($id);
        $user->name = $request->name;
        $user->f_name = $request->f_name;
        $user->m_name = $request->m_name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d', strtotime($request->dob));

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/employee_images/' . $user->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'), $filename);
            $user['image'] = $filename;
        }
        $user->save();

        $notification = array(
            'message' => 'Employee Registration Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('employee.registration.view')->with($notification);
    }

    public function EmployeeDetails($id)
    {
        $data['details'] = User::find($id);
        $pdf = PDF::loadView('backend.employee.employee_regist.employee_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('employee_registration_data.pdf');
    }
}
