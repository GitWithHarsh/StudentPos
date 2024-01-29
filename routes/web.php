<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\subAdmin\subAdminController;
use App\Http\Middleware\admin_login;
use App\Http\Middleware\subAdmin;

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

Route::get('/mvikjdsfiodsfiosjdfkkiojkioj', function () {
    return view('welcome');
});

Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";
});



// Admin Controller
Route::get('admin_login', [AdminController::class, 'admin_login']);
Route::post('login_admin', [AdminController::class, 'login_admin']);


Route::middleware(['middleware' => 'admin_login'])->group(function () {
    Route::get('Home', [AdminController::class, 'index']);
    Route::get('create_sub_admin', [AdminController::class, 'create_sub_admin']);
    Route::post('add_sub_admin', [AdminController::class, 'add_sub_admin']);
    Route::get('admin_logout', [AdminController::class, 'admin_logout']);
    Route::get('adminProfileManage', [AdminController::class, 'adminProfileManage']);
    Route::post('profile_update', [AdminController::class, 'profile_update']);
    Route::get('admin_chnagePassword', [AdminController::class, 'admin_chnagePassword']);
    Route::post('changePasswordSuccess', [AdminController::class, 'admin_change_passsword_success']);
    Route::get('total_branch', [AdminController::class, 'total_branch']);
    Route::post('changeStatus', [AdminController::class, 'changeStatus']);
    Route::get('totalStudent', [AdminController::class, 'totalStudent']);
    Route::get('branch_admin', [AdminController::class, 'branch_details_page']);
    Route::get('add_class', [AdminController::class, 'add_class']);
    Route::get('add_option', [AdminController::class, 'add_option']);
    Route::post('save_class', [AdminController::class, 'save_class']);
    Route::get('list_add_class', [AdminController::class, 'list_add_class']);
    Route::get('delete_data', [AdminController::class, 'delete_data']);
    Route::post('save_option', [AdminController::class, 'save_option']);
    Route::get('option_list', [AdminController::class, 'option_list']);
    Route::get('mailsend_school_fee', [AdminController::class, 'mailsend_school_fee']);
    Route::get('get_student', [AdminController::class, 'get_student']);
    Route::post('sendMail_schoolFee', [AdminController::class, 'sendMail_schoolFee']);
    Route::get('parentMeetingMail', [AdminController::class, 'parentMeetingMail']);
    Route::get('schoolFee', [AdminController::class, 'schoolFee']);
    Route::get('punishmentPage', [AdminController::class, 'punishmentPage']);
    Route::get('calllogPage', [AdminController::class, 'calllogPage']);
    Route::get('ParentMeeting', [AdminController::class, 'ParentMeeting']);
    Route::get('Publication', [AdminController::class, 'Publication']);
    Route::get('AddSchoolFee', [AdminController::class, 'AddSchoolFee']);
    Route::get('schoolFeeAdd', [AdminController::class, 'schoolFeeAdd']);
    Route::post('filterSchoolFee', [AdminController::class, 'filterSchoolFee']);
});


// Sub Admin Controller
Route::get('/', [subAdminController::class, 'sub_admin_login']);
Route::post('subAdminLogin', [subAdminController::class, 'subAdminLogin']);
Route::middleware(['middleware' => 'subAdmin'])->group(function () {
    Route::get('sub_index', [subAdminController::class, 'sub_index']);
    Route::get('logout_subadmin', [subAdminController::class, 'logout_subadmin']);
    Route::get('student_Register', [subAdminController::class, 'student_Register']);
    Route::post('save_student_register', [subAdminController::class, 'save_student_register']);
    Route::get('studentList', [subAdminController::class, 'studentList']);
    Route::get('delete_Student_Data', [subAdminController::class, 'delete_Student_Data']);
    Route::get('result_publication', [subAdminController::class, 'result_publication']);
    Route::get('parent_meeting', [subAdminController::class, 'parent_meeting']);
    Route::get('call_log', [subAdminController::class, 'call_log']);
    Route::get('school_fee', [subAdminController::class, 'school_fee']);
    Route::get('punishment', [subAdminController::class, 'punishment']);
    Route::get('profilePage', [subAdminController::class, 'profilePage']);
    Route::get('changePassword', [subAdminController::class, 'changePassword']);
    Route::post('profileChangePassword', [subAdminController::class, 'profileChangePassword']);
    Route::get('studentDetails', [subAdminController::class, 'studentDetails']);
    Route::post('mailSchoolFee', [subAdminController::class, 'mailSchoolFee']);
    Route::get('ManageStudent', [subAdminController::class, 'ManageStudent']);
    Route::post('filterOption', [subAdminController::class, 'filterOption']);
    Route::get('studentListByClass', [subAdminController::class, 'studentListByClass']);
    Route::post('uploadExcel', [subAdminController::class, 'uploadExcel']);
    Route::get('uploadResult', [subAdminController::class, 'uploadResult']);
    Route::post('filterDeposit', [subAdminController::class, 'filterDeposit']);
    Route::post('resultMailByBranch', [subAdminController::class, 'resultMailByBranch']);
    Route::post('resultSendMailAllStudent', [subAdminController::class, 'resultSendMailAllStudent']);
    Route::post('sendMailMeeting', [subAdminController::class, 'sendMailMeeting']);
    Route::post('sendMailforParentMeeting', [subAdminController::class, 'sendMailforParentMeeting']);
    Route::post('sendRemainderMailallStudent', [subAdminController::class, 'sendRemainderMailallStudent']);
    Route::get('editResult', [subAdminController::class, 'editResult']);
    Route::get('deleteAllData', [subAdminController::class, 'deleteAllData']);
    Route::post('updateResult', [subAdminController::class, 'updateResult']);
    Route::post('filterMeeting', [subAdminController::class, 'filterMeeting']);
    Route::post('statusChange', [subAdminController::class, 'statusChange']);
    Route::post('AddPunishment', [subAdminController::class, 'AddPunishment']);
    Route::post('callLogPresent', [subAdminController::class, 'callLogPresent']);
    Route::get('manageStudentByClass', [subAdminController::class, 'manageStudentByClass']);
    Route::get('deleteStudentByOption', [subAdminController::class, 'deleteStudentByOption']);
    Route::get('studentUpload', [subAdminController::class, 'studentUpload']);
    Route::post('uploadExcelStudentRegistration', [subAdminController::class, 'uploadExcelStudentRegistration']);
    Route::get('ResultByDate', [subAdminController::class, 'ResultByDate']);
});
