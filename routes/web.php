<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\GroupCountroller;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileCourseController;
use App\Http\Controllers\FileDiplomaController;
use App\Http\Controllers\FinancialPaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentEvalutionController;
use App\Http\Controllers\TheVisitController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TrainerEvaluationController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\VistorController;
use App\Models\Student_evaluation;
use Illuminate\Support\Facades\Route;

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
    return view('button_users');
});

// Route::view('' , 'dashboard.parent');

Route::prefix('cms/')->middleware('guest:admin,employee,trainer,student')->group(function(){
    route::get('{guard}/login' , [UserAuthController::class , 'showLogin'])->name('view.login');
    route::post('{guard}/login' , [UserAuthController::class , 'Login']);
});

Route::prefix('cms/admin')->middleware('auth:admin,employee,trainer,student')->group(function(){
    Route::get('/logout' , [UserAuthController::class , 'Logout'])->name('cms.admin.logout');
    // Route::get('profile/edit' , [UserAuthController::class , 'editProfile'])->name('edit-profile');
    Route::get('profile/edit' , [UserAuthController::class , 'editProfile'])->name('dashboard.auth.profile-edit');
    Route::post('profile/update' , [UserAuthController::class , 'updateProfile'])->name('cms.auth.update-profile');
    Route::get('password/edit' , [UserAuthController::class , 'editPassword'])->name('cms.admin.edit-password');
    Route::post('update/password', [UserAuthController::class, 'updatePassword'])->name('dashboard.auth.update-password');
    // Route::get('edit/password' , [SettingController::class , 'editPassword'])->name('cms.auth.editPassword');
    // Route::post('update/password' , [SettingController::class , 'updatePassword'])->name('cms.auth.updatePassword');

});


Route::prefix('cms/admin/')->middleware('auth:admin,employee,trainer,student')->group(function(){
    Route::post('profile/update' , [UserAuthController::class , 'updateProfile'])->name('cms.auth.update-profile');

    Route::view('' , 'dashboard.home')->name('home');
    // Route::view('' , 'dashboard.parent');
    // Route::view('parent' , 'cms.parent');
    // Route::view('test' , 'cms.test');
    Route::resource('cities' , CityController::class);
    Route::post('update_cities/{id}' , [CityController::class , 'update'])->name('update_cities');
    Route::resource('rooms', RoomController::class);
    Route::post('update_rooms/{id}' , [RoomController::class])->name('update_rooms');
    Route::resource('timelines', TimelineController::class);
    Route::post('update_timelines/{id}' , [TimelineController::class])->name('update_timelines');

    Route::resource('diplomas', DiplomaController::class);
    Route::post('update_diplomas/{id}' , [DiplomaController::class , 'update'])->name('update_diplomas');

    Route::resource('admins', AdminController::class);
    Route::post('update_admins/{id}' , [AdminController::class , 'update'])->name('update_admins');
    Route::get('restore/{id}' , [AdminController::class , 'restore'])->name('restore');
    Route::delete('forceDelete/{id}' , [AdminController::class , 'forceDelete']);
    Route::get('indexDelete' , [AdminController::class , 'indexDelete'])->name('indexDelete');

    Route::resource('groups', GroupCountroller::class);
    Route::post('update_groups/{id}' , [GroupCountroller::class , 'update'])->name('update_groups');

    Route::resource('employees', EmployeeController::class);
    Route::post('update_employees/{id}' , [EmployeeController::class , 'update'])->name('update_employees');
    Route::get('employee_edit' , [EmployeeController::class , 'edit'])->name('employee_edit');
    Route::post('update_employee' , [EmployeeController::class , 'update']);


    Route::resource('roles', RoleController::class);
    Route::post('update_roles/{id}' , [RoleController::class , 'update'])->name('update_roles');
    Route::resource('permissions', PermissionController::class);
    Route::post('update_permissions/{id}' , [PermissionController::class , 'update'])->name('update_permissions');
    Route::resource('role.permissions', RolePermissionController::class);


    // Route::get('/create/groups/{id}', [GroupCountroller::class, 'createGroup'])->name('createGroup');
    // Route::get('/index/groups/{id}', [GroupCountroller::class, 'indexGroup'])->name('indexGroup');

    Route::resource('courses', CourseController::class);
    Route::post('update_courses/{id}' , [CourseController::class , 'update'])->name('update_courses');

    Route::resource('trainers', TrainerController::class);
    // Route::post('update_trainers/{id}' , [TrainerController::class , 'update'])->name('update_trainers');
    Route::get('/create/trainer/{id}', [TrainerController::class, 'createTrainer'])->name('createTrainer');
    Route::get('/index/trainer/{id}', [TrainerController::class, 'indexTrainer'])->name('indexTrainer');
    // Route::get('/create/trainer/{id}', [TrainerController::class, 'createTrainer'])->name('createTrainer');
    Route::get('/index/trainer/{id}', [TrainerController::class, 'indexTrainerGroup'])->name('indexTrainerGroup');
    Route::get('trainer_edit' , [TrainerController::class , 'edit'])->name('trainer_edit');
    Route::post('update_trainers' , [TrainerController::class , 'update'])->name('update_trainers');


    Route::resource('students', StudentController::class);
    Route::post('update_students/{id}' , [StudentController::class , 'update'])->name('update_students');
    Route::resource('codes', StudentController::class);
    Route::post('update_code/{id}' , [StudentController::class , 'update'])->name('update_students');


    Route::resource('applies', ApplyController::class);
    Route::post('update_applies/{id}' , [ApplyController::class , 'update'])->name('update_applies');

    Route::resource('student_evalutions', StudentEvalutionController::class);
    Route::post('update_student_evalutions/{id}' , [StudentEvalutionController::class , 'update'])->name('update_student_evalutions');

    Route::get('/create/student_evalutions/{id}', [StudentEvalutionController::class, 'createStudent'])->name('createStudent');
    Route::get('/index/student_evalutions/{id}', [StudentEvalutionController::class, 'indexStudent'])->name('indexStudent');

    Route::resource('conditions', ConditionController::class);
    Route::post('update_conditions/{id}' , [ConditionController::class , 'update'])->name('update_conditions');

    Route::get('/create/conditions/{id}', [ConditionController::class, 'createCondition'])->name('createCondition');
    Route::get('/index/conditions/{id}', [ConditionController::class, 'indexCondition'])->name('indexCondition');

    Route::get('/index-student/{id}', [StudentController::class, 'indexStudents'])->name('indexStudents');

    Route::resource('fileCourses', FileCourseController::class);
    Route::post('update_files/{id}' , [FileCourseController::class , 'update'])->name('update_files');
    Route::resource('fileDiplomas', FileDiplomaController::class);
    Route::post('update_fileDiplomas/{id}' , [FileDiplomaController::class , 'update'])->name('update_files');

    Route::get('/create/courses/{id}', [CourseController::class, 'createCourse'])->name('createCourse');
    Route::get('/index/courses/{id}', [CourseController::class, 'indexCourse'])->name('indexCourse');

    Route::get('/create/files/{id}', [FileCourseController::class, 'createFile'])->name('createCFile');
    Route::get('/index/files/{id}', [FileCourseController::class, 'indexFile'])->name('indexCFile');

    Route::get('/create/files-diploma/{id}', [FileDiplomaController::class, 'createFile'])->name('createDFile');
    Route::get('/index/files-diploma/{id}', [FileDiplomaController::class, 'indexFile'])->name('indexDFile');

    Route::get('/showGroups/{id}', [DiplomaController::class, 'showGroup'])->name('showGroup');
    Route::get('/showTrainer/{id}', [DiplomaController::class, 'showTrainers'])->name('showTrainers');
    // Route::get('/showTrainer/{id}', [GroupCountroller::class, 'showTrainersGroup'])->name('showTrainersGroup');


    // Route::get('/create/files/{id}', [FileCourseController::class, 'createFile'])->name('createFile');
    // Route::get('/index/files/{id}', [FileCourseController::class, 'indexFile'])->name('indexFile');

    Route::resource('vistors', VistorController::class);
    Route::post('update_vistors/{id}' , [VistorController::class , 'update'])->name('update_vistors');
    
    Route::resource('the_visits', TheVisitController::class);
    Route::post('update_the_visits/{id}' , [TheVisitController::class , 'update'])->name('update_the_visits');
    Route::get('/create/the_visits/{id}', [TheVisitController::class, 'createTheVisit'])->name('createTheVisit');
    Route::get('/index/the_visits/{id}', [TheVisitController::class, 'indexTheVisit'])->name('indexTheVisit');

    Route::resource('connections', ConnectionController::class);
    Route::post('update_connections/{id}' , [ConnectionController::class , 'update'])->name('update_connections');

    Route::get('student-exports-excel' , [StudentController::class , 'export'])->name('student-exports-excel');
    Route::get('course-exports-excel' , [CourseController::class , 'export'])->name('course-exports-excel');
    Route::get('group-exports-excel' , [GroupCountroller::class , 'export'])->name('group-exports-excel');
    Route::get('trainer-exports-excel' , [TrainerController::class , 'export'])->name('trainer-exports-excel');
    Route::get('Vistor-exports-excel' , [VistorController::class , 'export'])->name('Vistor-exports-excel');
    Route::get('connection-exports-excel' , [ConnectionController::class , 'export'])->name('connection-exports-excel');


    Route::resource('trainer_evalutions', TrainerEvaluationController::class);
    Route::post('update_trainer_evalutions/{id}' , [TrainerEvaluationController::class , 'update'])->name('update_trainer_evalutions');

    Route::get('/create/trainer_evalutions/{id}', [TrainerEvaluationController::class, 'createTrainerEvaluation'])->name('createTrainerEvaluation');
    Route::get('/index/trainer_evalutions/{id}', [TrainerEvaluationController::class, 'indexTrainerEvaluation'])->name('indexTrainerEvaluation');

    Route::resource('financial_payments', FinancialPaymentController::class);
    Route::post('update_financial_payments/{id}' , [FinancialPaymentController::class , 'update'])->name('update_financial_payments');


    Route::resource('payments', PaymentController::class);
    Route::post('update_payments/{id}' , [PaymentController::class , 'update'])->name('update_payments');

    Route::get('/create/payments/{id}', [PaymentController::class, 'createPayment'])->name('createPayment');
    Route::get('/index/payments/{id}', [PaymentController::class, 'indexPayment'])->name('indexPayment');

    Route::view('test' ,"dashboard.group.index2");


    Route::get('/download', [FileDiplomaController::class, 'download'])->name('download');

});
