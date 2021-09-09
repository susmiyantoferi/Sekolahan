<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.student_year.view_year', $data);
    }

    public function AddYear()
    {
        return view('backend.setup.student_year.add_year');
    }

    public function StudentYearStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearEdit($id){
        $edit = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year' ,compact('edit'));
    }

    public function StudentYearUpdate(Request $request, $id){
        $update = StudentYear::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,' . $update->id
        ]);

        $update->name = $request->name;
        $update->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id){
        $delete = StudentYear::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.year.view')->with($notification);
    }
}