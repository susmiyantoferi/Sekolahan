<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesination()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function AddDesination()
    {
        return view('backend.setup.designation.add_designation');
    }

    public function StoreDesination(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function EditDesination($id)
    {
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('editData'));
    }

    public function UpdateDesination(Request $request, $id)
    {
        $data = Designation::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name,' . $data->id
        ]);


        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function DeleteDesination($id)
    {
        $delete = Designation::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('designation.view')->with($notification);
    }
}
