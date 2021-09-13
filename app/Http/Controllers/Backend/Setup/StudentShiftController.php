<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewShift()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.student_shift.view_shift', $data);
    }

    public function AddShift()
    {
        return view('backend.setup.student_shift.add_shift');
    }

    public function StudentShiftStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftEdit($id)
    {
        $edit = StudentShift::find($id);
        return view('backend.setup.student_shift.edit_shift', compact('edit'));
    }

    public function StudentShiftUpdate(Request $request, $id)
    {
        $update = StudentShift::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $update->id
        ]);

        $update->name = $request->name;
        $update->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id){
        $delete = StudentShift::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
}