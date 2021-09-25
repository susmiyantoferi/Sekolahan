<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\AssignSubject;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubj()
    {
        //$data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    public function AddAssignSubj()
    {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }

    public function StoreAssignSubj(Request $request)
    {
        $subjectCount = count($request->subject_id);
        if ($subjectCount != Null) {
            for ($i = 0; $i < $subjectCount; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            } // end for loop
        } // end if condition

        $notification = array(
            'message' => 'Assign Subject Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }

    public function EditAssignSubj($class_id)
    {
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        // dd($data['editData']->toArray());

        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject', $data);
    }

    public function UpdateAssignSubj(Request $request, $class_id)
    {
        if ($request->subject_id == null) {
            $notification = array(
                'message' => 'Sorry You Do Not Select Any School Subject',
                'alert-type' => 'error',
            );

            return redirect()->route('assign.subject.edit', $class_id)->with($notification);
        } else {

            $countSubject = count($request->subject_id);
            AssignSubject::where('class_id', $class_id)->delete();
            for ($i = 0; $i < $countSubject; $i++) {
                $assign_subj = new AssignSubject();
                $assign_subj->class_id = $request->class_id;
                $assign_subj->subject_id = $request->subject_id[$i];
                $assign_subj->full_mark = $request->full_mark[$i];
                $assign_subj->pass_mark = $request->pass_mark[$i];
                $assign_subj->subjective_mark = $request->subjective_mark[$i];
                $assign_subj->save();
            } // end for loop


        } //end if else

        $notification = array(
            'message' => 'Data Assign Subject Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }

    public function DetailsAssignSubj($class_id)
    {
        $data['detailsData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject', $data);
    }
}
