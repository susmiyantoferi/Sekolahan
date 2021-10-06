<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

class StudentRegistController extends Controller
{
    public function ViewStudentRegist()
    {
        $data['allData'] = AssignStudent::all();
        return view('backend.student.student_regist.student_view', $data);
    }
}
