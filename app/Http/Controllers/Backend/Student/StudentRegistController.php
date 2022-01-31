<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use App\Models\DiscountStudent;

class StudentRegistController extends Controller
{
    public function ViewStudentRegist()
    {
        $data['allData'] = AssignStudent::all();
        return view('backend.student.student_regist.student_view', $data);
    }

    public function AddStudentRegist()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_regist.student_add', $data);
    }
}