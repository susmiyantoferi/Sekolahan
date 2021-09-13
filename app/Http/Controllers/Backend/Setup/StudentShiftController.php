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
}