<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCatrgoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;

use App\Http\Controllers\Backend\Student\StudentRegistController;
use App\Http\Controllers\Backend\Student\StudentRollController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


//all route AdminController
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


//view User All route
Route::prefix('users')->group(function () {

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/store/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
});

//User Profile
Route::prefix('profile')->group(function () {

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});

//All Route Student Class
Route::prefix('setup')->group(function () {

    //Student Class Route
    Route::get('/student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
    Route::get('/student/class/add', [StudentClassController::class, 'StudentAddClass'])->name('student.class.add');
    Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

    //Student Year Route & Student Year Controller
    Route::get('/student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class, 'AddYear'])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');
    Route::get('/student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

    //Student Group Route & Student Group Controller
    Route::get('/student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
    Route::get('/student/group/add', [StudentGroupController::class, 'AddGroup'])->name('student.group.add');
    Route::post('/student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('store.student.group');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('update.student.group');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

    //Student Shift Route & Student Shift Controller
    Route::get('/student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
    Route::get('/student/shift/add', [StudentShiftController::class, 'AddShift'])->name('student.shift.add');
    Route::post('/student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('store.student.shift');
    Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
    Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('update.student.shift');
    Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');

    //Fee Category Route & Fee Category Controller
    Route::get('/fee/category/view', [FeeCatrgoryController::class, 'ViewFeeCategory'])->name('fee.category.view');
    Route::get('/fee/category/add', [FeeCatrgoryController::class, 'AddFeeCategory'])->name('fee.category.add');
    Route::post('/fee/category/store', [FeeCatrgoryController::class, 'FeeCategoryStore'])->name('store.fee.category');
    Route::get('/fee/category/edit/{id}', [FeeCatrgoryController::class, 'FeeCategoryEdit'])->name('fee.category.edit');
    Route::post('/fee/category/update/{id}', [FeeCatrgoryController::class, 'FeeCategoryUpdate'])->name('update.fee.category');
    Route::get('/fee/category/delete/{id}', [FeeCatrgoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');

    //Fee Category Amount Route & Fee Category Amount Controller
    Route::get('/fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('/fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
    Route::post('/fee/amount/store', [FeeAmountController::class, 'FeeAmountStore'])->name('store.fee.amount');
    Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee.amount.edit');
    Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('update.fee.amount');
    Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');

    //Exam Type Route & Exam Type Controller
    Route::get('/exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    Route::get('/exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.type.add');
    Route::post('/exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('store.exam.type');
    Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
    Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('update.exam.type');
    Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

    //School Subject Route & School Subject Controller
    Route::get('/school/subject/view', [SchoolSubjectController::class, 'ViewSchoolSub'])->name('school.subject.view');
    Route::get('/school/subject/add', [SchoolSubjectController::class, 'AddSchoolSub'])->name('school.subject.add');
    Route::post('/school/subject/store', [SchoolSubjectController::class, 'StoreSchoolSubj'])->name('store.school.subject');
    Route::get('/school/subject/edit/{id}', [SchoolSubjectController::class, 'EditSchoolSub'])->name('school.subject.edit');
    Route::post('/school/subject/update/{id}', [SchoolSubjectController::class, 'UpdateSchoolSubj'])->name('update.school.subject');
    Route::get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'DeleteSchoolSub'])->name('school.subject.delete');

    //Assign Subject Route & Assign Subject Controller
    Route::get('/assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubj'])->name('assign.subject.view');
    Route::get('/assign/subject/add', [AssignSubjectController::class, 'AddAssignSubj'])->name('assign.subject.add');
    Route::post('/assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubj'])->name('store.assign.subject');
    Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubj'])->name('assign.subject.edit');
    Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubj'])->name('update.assign.subject');
    Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubj'])->name('assign.subject.details');

    // Designation Route & Designation  Controller
    Route::get('/designation/view', [DesignationController::class, 'ViewDesination'])->name('designation.view');
    Route::get('/designation/add', [DesignationController::class, 'AddDesination'])->name('designation.add');
    Route::post('/designation/store', [DesignationController::class, 'StoreDesination'])->name('store.designation');
    Route::get('/designation/edit/{id}', [DesignationController::class, 'EditDesination'])->name('designation.edit');
    Route::post('/designation/update/{id}', [DesignationController::class, 'UpdateDesination'])->name('update.designation');
    Route::get('/designation/delete/{id}', [DesignationController::class, 'DeleteDesination'])->name('designation.delete');
});


//Student Management All Prefix
Route::prefix('students')->group(function () {

    //Student Registration Route
    Route::get('/registration/view', [StudentRegistController::class, 'ViewStudentRegist'])->name('student.registration.view');
    Route::get('/registration/add', [StudentRegistController::class, 'AddStudentRegist'])->name('student.registration.add');
    Route::post('/registration/store', [StudentRegistController::class, 'StudentRegStore'])->name('store.student.registration');
    Route::get('/year/class/search', [StudentRegistController::class, 'StudentClassYearSearch'])->name('student.year.class.search');
    Route::get('/registration/edit/{student_id}', [StudentRegistController::class, 'StudentRegEdit'])->name('student.registration.edit');
    Route::post('/registration/update/{student_id}', [StudentRegistController::class, 'StudentRegUpdate'])->name('update.student.registration');
    Route::get('/registration/promotion/{student_id}', [StudentRegistController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
    Route::post('/registration/update/promotion/{student_id}', [StudentRegistController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
    Route::get('/registration/details/{student_id}', [StudentRegistController::class, 'StudentRegDetails'])->name('student.registration.details');

    //Student Roll Generate Route
    Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
    Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
    Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');
});
