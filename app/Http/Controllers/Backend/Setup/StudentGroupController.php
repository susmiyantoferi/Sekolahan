<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroup()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group', $data);
    }

    public function AddGroup()
    {
        return view('backend.setup.student_group.add_group');
    }

    public function StudentGroupStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id)
    {
        $edit = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group', compact('edit'));
    }

    public function StudentGroupUpdate(Request $request, $id)
    {
        $update = StudentGroup::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name,' . $update->id
        ]);

        $update->name = $request->name;
        $update->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id)
    {
        $delete = StudentGroup::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
