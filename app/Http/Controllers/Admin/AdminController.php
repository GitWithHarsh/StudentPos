<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addSubAdmin;
use App\Models\admin;
use App\Models\studentRegister;
use App\Models\AddClass;
use App\Models\Publication;
use App\Models\AddOption;
use App\Models\SchoolFee;
use App\Models\ParentMeeting;
use App\Models\calllog;
use App\Models\punishment;
use App\Models\SchoolFeeByAdmin;
use Mockery\Expectation;
use DB;
use Session;
use Mail;
use Cookie;

class AdminController extends Controller
{
    public function index()
    {
        $data['totalsubAdmin'] = addSubAdmin::where(['status' => 1])->count();
        $data['studentData'] = studentRegister::where(['status' => 1])->count();
        $data['SchoolFee'] = SchoolFee::count();
        $data['punishment'] = punishment::count();
        $data['calllog'] = calllog::count();
        $data['ParentMeeting'] = ParentMeeting::count();
        $data['Publication'] = Publication::count();
        return view('Admin.index', $data);
    }
    public function create_sub_admin(Request $request)
    {
        $id =  base64_decode($request->id);
        $data['details'] = addSubAdmin::where(['id' => $id])->first();
        return view('Admin.create_sub_admin', $data);
    }
    public function admin_login()
    {
        return view('Admin.login_by_admin');
    }
    public function login_admin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $admin_details = admin::where(['email' => $email, 'password' => $password])->first();
        if ($admin_details || isset($admin_details)) {
            Session()->put('admin_id', $admin_details->id);
            return redirect('Home');
        } else {
            return redirect('admin_login')->with('message', 'Please try again');
        }
    }
    public function admin_logout()
    {
        Session()->flush();
        return redirect('admin_login');
    }
    public function adminProfileManage()
    {
        $adminId = session()->get('admin_id');
        $data['profileManage'] = admin::where(['id' => $adminId])->first();
        return view('Admin.profile_manage', $data);
    }
    public function profile_update(Request $request)
    {
        $profileId = $request->profileId;
        $rememberBox = $request->rememberBox;
        if ($rememberBox == "true") {
            setcookie('userEmail', $request->Email);
        }
        $adminId = admin::where(['id' => $profileId])->first();
        if ($adminId || isset($adminId)) {
            if ($request->hasFile('admin_image')) {
                $image = $request->file('admin_image');
                $profile_image = time() . '.' . $image->getClientOriginalExtension();
                $image->move('branch_image', $profile_image);
            } else {
                $profile_image = $request->profile_image;
            }
            $table = admin::find($profileId);
            $table->name = $request->Name;
            $table->email = $request->Email;
            $table->image = $profile_image;
            $table->save();
            echo "done";
        } else {
            echo "NotDone";
        }
    }
    public function add_sub_admin(Request $request)
    {
        $profileId = $request->profileId;
        $rand = rand(1000, 9999);
        if ($request->hasFile('branch_name')) {
            $image = $request->file('branch_name');
            $branch_image = time() . '.' . $image->getClientOriginalExtension();
            $image->move('branch_image', $branch_image);
        } else {
            $branch_image = $request->branch_image;
        }
        if ($request->id || isset($request->id)) {
            $table = addSubAdmin::find($request->id);
            $table->first_name = $request->first_name;
            $table->last_name = $request->last_name;
            $table->gender = $request->gender;
            $table->branch_name = $request->branch_names;
            $table->branch_location = $request->branch_location;
            $table->state = $request->state;
            $table->pincode = $request->pincode;
            $table->city = $request->city;
            $table->country = $request->country;
            $table->branch_id = $rand;
            $table->branch_image = $branch_image;
            $table->save();
            echo "update";
        } else if ($profileId) {
            $table = addSubAdmin::find($profileId);
            $table->branch_image = $branch_image;
            $table->branch_name = $request->branchName;
            $table->first_name = $request->firstName;
            $table->last_name = $request->lastName;
            $table->gender = $request->gender;
            $table->branch_location = $request->location;
            $table->city = $request->City;
            $table->save();
            echo "profile";
        } else {
            $table = new addSubAdmin();
            $table->first_name = $request->first_name;
            $table->last_name = $request->last_name;
            $table->gender = $request->gender;
            $table->branch_name = $request->branch_names;
            $table->branch_location = $request->branch_location;
            $table->state = $request->state;
            $table->pincode = $request->pincode;
            $table->branch_id = $rand;
            $table->city = $request->city;
            $table->country = $request->country;
            $table->branch_image = $branch_image;
            $table->save();
            echo "create";
        }
    }
    public function admin_chnagePassword()
    {
        return view('Admin.admin_chnagePassword');
    }
    public function admin_change_passsword_success(Request $harsh)
    {
        $current = $harsh->current_password;
        $password = $harsh->password;
        $checkoxValue = $harsh->checckboxValue;
        $id = session()->get('admin_id');
        $AdminDetails = admin::where(['id' => $id])->first();
        if ($checkoxValue == "true") {
            setcookie('passwored', $password);
        }
        if ($AdminDetails || isset($AdminDetails)) {
            $adminPassword = admin::where('id', $id)->where('password', $current)->first();
            if ($adminPassword || isset($adminPassword)) {
                $table = admin::find($id);
                $table->password = $password;
                $table->save();
                echo 'Done';
            } else {
                echo "currentPasswordNotMatch";
            }
        }
    }
    public function total_branch()
    {
        $data['branchList'] = addSubAdmin::where('status', '!=', 2)->get();
        return view('Admin.branchList', $data);
    }
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $model = $request->model;
        $modelName = '\App\Models\\' . $model;
        $admin_Branch_status = $modelName::where(['id' => $id])->first();
        if ($admin_Branch_status->status == 1) {
            $table = $modelName::find($id);
            $table->status = 0;
            $table->save();
            echo "done";
        } else if ($admin_Branch_status->status == 0) {
            $table = $modelName::find($id);
            $table->status = 1;
            $table->save();
            echo "done";
        }
    }
    public function totalStudent()
    {
        $data['studentRegister'] = studentRegister::where('status', '!=', 2)->get();
        return view('Admin.totalStudent', $data);
    }
    public function branch_details_page(Request $request)
    {
        $id = base64_decode($request->id);
        $data['addSubAdmin'] = addSubAdmin::where(['id' => $id])->first();
        $data['totalStudent'] = studentRegister::where(['branch_id' => $data['addSubAdmin']['branch_id']])->count();
        $data['Publication'] = Publication::where(['status' => 1, 'branch_id' => $data['addSubAdmin']['branch_id']])->get();
        $data['SchoolFee'] = SchoolFee::where(['branch_id' => $data['addSubAdmin']['branch_id']])->get();
        $data['ParentMeeting'] = ParentMeeting::where(['branch_id' => $data['addSubAdmin']['branch_id']])->get();
        $data['calllog'] = calllog::where(['branch_id' => $data['addSubAdmin']['branch_id']])->get();
        $data['punishment'] = punishment::where(['branch_id' => $data['addSubAdmin']['branch_id']])->get();
        return view('Admin.branchDetails', $data);
    }
    public function add_class(Request $request)
    {
        $id = base64_decode($request->id);
        $data['addClass'] = AddClass::where(['id' => $id])->first();
        return view('Admin.add_class', $data);
    }
    public function save_class(Request $request)
    {
        $id = $request->add_class_id;
        if ($id) {
            $table = AddClass::find($id);
            $table->add_class = $request->add_class;
            $table->save();
            echo "done";
        } else {
            $table = new AddClass();
            $table->add_class = $request->add_class;
            $table->save();
            echo "save";
        }
    }
    public function list_add_class()
    {
        $data['AddClass'] = AddClass::where('status', '!=', 2)->get();
        return view('Admin.list_add_class', $data);
    }
    public function add_option(Request $request)
    {
        $id = base64_decode($request->id);
        // $data['option'] = AddOption::where('id', $id)->first();
        $data['option'] = DB::table('add_options')
            ->select('add_options.*', 'add_classes.*')
            ->join('add_classes', 'add_options.className', '=', 'add_classes.id')
            ->where('add_options.id', $id)
            ->first();
        $data['classList'] = AddClass::where(['status' => 1])->get();
        return view('Admin.add_option', $data);
    }
    public function save_option(Request $request)
    {
        $id = $request->optionId;
        if ($id) {
            $table = AddOption::find($id);
            $table->option = $request->option;
            $table->className = $request->className;
            $table->save();
            echo "update";
        } else {
            $table = new AddOption();
            $table->option = $request->option;
            $table->className = $request->className;
            $table->save();
            echo "done";
        }
    }
    public function option_list()
    {
        $data['AddOption'] = AddOption::where('status', '!=', 2)->get();
        return view('Admin.option_list', $data);
    }
    public function delete_data(Request $request)
    {
        $id = base64_decode($request->id);
        $model = 'App\Models\\' . base64_decode($request->key);
        if ($id || isset($id)) {
            $model::where('id', $id)->delete();
            return redirect()->back()->with('message', 'Class Successfully Deleted');
        }
    }
    public function mailsend_school_fee(Request $request)
    {
        $data['id'] = base64_decode($request->id);
        $data['classList'] = AddClass::where(['status' => 1])->get();
        $data['studentRegister'] = studentRegister::where(['status' => 1])->get();
        return view('Admin.schoolFeemailselect', $data);
    }
    public function get_student(Request $harsh)
    {
        $id =  $harsh->id;
        $ids =  $harsh->ids;
        if ($id || isset($id)) {
            $studentRegister = studentRegister::where(['student_class' => $id, 'status' => 1])->get();
            $classDetials = '';
            $classDetials .= '<div style="margin-top: 20px;">
        <select id="studentSelect" class="form-control classlist" onchange="selectStudent()">
            <option selected="selected" disabled="disabled" value="selectStudent">Please select the Student</option>';
            if (count($studentRegister) > 0) {
                foreach ($studentRegister as $val) {
                    $classDetials .=
                        '<option value="' . $val->id . '">' . $val->first_name . ' ' . $val->last_name . '</option>';
                }
            }
            $classDetials .= ' </select>
        </div>';
            echo $classDetials;
        } else if ($ids || isset($ids)) {
            $studentRegister =  studentRegister::where(['id' => $ids, 'status' => 1])->first();
            $classDetials = '';
            $classDetials .= '<div style="margin-top: 20px;">
            <select class="form-control classlist" id="fatherName">
                <option selected disabled value="' . $studentRegister->id . '">' . $studentRegister->father . '</option>
            </select>
        </div>';
            echo $classDetials;
        }
    }
    public function sendMail_schoolFee(Request $harsh)
    {
        $reminder = $harsh->reminder;
        $classId = $harsh->classId;
        $studentSelect = $harsh->studentSelect;
        $fatherName = $harsh->fatherName;
        $id = $harsh->id;
        $name = $harsh->name;
        if ($reminder || $name == "remainder") {
            $studentRegister = studentRegister::where(['id' => $studentSelect, 'status' => 1])->first();
            $AddClass = AddClass::where(['id' => $studentRegister->student_class])->first();
            $SchoolFee = SchoolFee::where(['student_id' => $studentRegister->student_image])->first();
            if ($SchoolFee || isset($SchoolFee)) {
                $email = $studentRegister->email;
                $data = ['email' => $email, 'name' => $studentRegister->first_name, 'class' => $AddClass->add_class, 'ramaing' => $SchoolFee->outstanding_amount];
                Mail::send('Admin.MailSend.remainSchoolFee', $data, function ($message) use ($email, $data) {
                    $message->to($email, 'School Fee')
                        ->subject('Student Pos');
                    $message->from('mobappssolutions154@gmail.com', 'Student POS');
                });
                $sum = $SchoolFee->remain;
                $table = SchoolFee::find($SchoolFee->id);
                $table->remain = ++$sum;
                $table->save();
                echo "done";
            } else {
                echo "not";
            }
        } else if ($id || isset($id)) {
            $studentRegister = studentRegister::where(['id' => $studentSelect, 'status' => 1])->first();
            $AddClass = AddClass::where(['id' => $studentRegister->student_class])->first();
            $SchoolFee = Publication::where(['student_id' => $studentRegister->student_image])->first();
            if ($SchoolFee || isset($SchoolFee)) {
                $email = $studentRegister->email;
                $data = ['email' => $email, 'father' => $studentRegister->father, 'name' => $studentRegister->first_name, 'class' => $AddClass->add_class, 'obtained' => $SchoolFee->percentage, 'place_occupied' => $SchoolFee->place_occupied];
                Mail::send('Admin.MailSend.parentMeeting', $data, function ($message) use ($email, $data) {
                    $message->to($email, 'School Fee')
                        ->subject('Student Pos');
                    $message->from('mobappssolutions154@gmail.com', 'Student POS');
                });
                $table = Publication::find($SchoolFee->id);
                $table->mailSend = 1;
                $table->save();
                echo "done";
            } else {
                echo "not";
            }
        } else if ($name == "deposit") {
            $studentRegister = studentRegister::where(['id' => $studentSelect, 'status' => 1])->first();
            $AddClass = AddClass::where(['id' => $studentRegister->student_class])->first();
            $SchoolFee = SchoolFee::where(['student_id' => $studentRegister->student_image])->first();
            if ($SchoolFee || isset($SchoolFee)) {
                $email = $studentRegister->email;
                $data = ['email' => $email, 'name' => $studentRegister->first_name, 'class' => $AddClass->add_class, 'paid' => $SchoolFee->amount_paid, 'total' => $SchoolFee->balance, 'ramaing' => $SchoolFee->outstanding_amount];
                Mail::send('Admin.MailSend.schoolfee', $data, function ($message) use ($email, $data) {
                    $message->to($email, 'School Fee')
                        ->subject('Student Pos');
                    $message->from('mobappssolutions154@gmail.com', 'Student POS');
                });
                $sums = $SchoolFee->remain;
                $table = SchoolFee::find($SchoolFee->id);
                $table->mailSend = ++$sums;
                $table->save();
                echo "done";
            } else {
                echo "not";
            }
        }
    }
    public function parentMeetingMail()
    {
        $data['classList'] = AddClass::where(['status' => 1])->get();
        $data['studentRegister'] = studentRegister::where(['status' => 1])->get();
        return view('Admin.parentMeetingMail', $data);
    }
    public function schoolFee()
    {
        $data['SchoolFee'] = SchoolFee::get();
        return view('Admin.school_fee_page', $data);
    }
    public function punishmentPage()
    {
        $data['punishment'] = punishment::get();
        return view('Admin.punishmentPage', $data);
    }
    public function calllogPage()
    {
        $data['calllog'] = calllog::get();
        return view('Admin.calllogPage', $data);
    }
    public function ParentMeeting()
    {
        $data['ParentMeeting'] = ParentMeeting::get();
        return view('Admin.ParentMeetingPage', $data);
    }
    public function Publication()
    {
        $data['Publication'] = Publication::get();
        return view('Admin.PublicationPage', $data);
    }

    public function AddSchoolFee()
    {
        $data['schollFee'] = DB::table('school_fee_by_admins')
            ->select('school_fee_by_admins.*', 'add_options.id as OptionId', 'add_options.option as option', 'add_classes.id as ClassId', 'add_classes.add_class as ClassName')
            ->join('add_options', 'add_options.id', '=', 'school_fee_by_admins.Option')
            ->join('add_classes', 'add_classes.id', '=', 'school_fee_by_admins.Class')
            ->where('school_fee_by_admins.deleted_at', '=', Null)
            ->get();
        return view('Admin.AddSchoolFee', $data);
    }

    public function schoolFeeAdd(Request $harsh)
    {
        $data['Class'] = AddClass::where(['status' => 1])->get();
        $data['ClassDetails'] = DB::table('school_fee_by_admins')
            ->select('school_fee_by_admins.*', 'add_options.id as OptionId', 'add_options.option as option', 'add_classes.id as ClassId', 'add_classes.add_class as ClassName')
            ->join('add_options', 'add_options.id', '=', 'school_fee_by_admins.Option')
            ->join('add_classes', 'add_classes.id', '=', 'school_fee_by_admins.Class')
            ->where('school_fee_by_admins.id', base64_decode($harsh->key))
            ->first();

        return view('Admin.schoolFeeAdd', $data);
    }

    public function filterSchoolFee(Request $harsh)
    {
        $selectClass = $harsh->selectClass;
        $Amount = $harsh->Amount;
        if ($selectClass || isset($selectClass)) {
            $allOption =  AddOption::where(['className' => $selectClass, 'status' => 1])->get();
            $filter = '';
            $filter .= '<select class="form-control" id="SelectOption">
        <option disabled selected>Select Class</option>';
            foreach ($allOption as $val) {
                $filter .= '<option value="' . $val->id . '">' . $val->option . '</option>';
            }
            $filter .= '</select>';
            echo $filter;
        } else if ($Amount || isset($Amount)) {
            $table = new SchoolFeeByAdmin();
            $table->Class = $harsh->selectClassByFee;
            $table->Option = $harsh->SelectOption;
            $table->SchoolFee = $Amount;
            $table->save();
            echo "done";
        }
    }
    public function addBrach()
    {
        echo "d";
    }
}
