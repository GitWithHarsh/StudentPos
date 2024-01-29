<?php

namespace App\Http\Controllers\subAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addSubAdmin;
use App\Models\studentRegister;
use App\Models\AddClass;
use App\Models\AddOption;
use App\Models\SchoolFee;
use App\Models\calllog;
use App\Models\Publication;
use App\Models\ParentMeeting;
use App\Models\punishment;
use App\Models\SchoolFeeByAdmin;
use Session;
use App\Imports\ResultImport;
use App\Imports\ImportStudent;

use Excel;
use Mail;
use DB;
use Carbon\Carbon;

class subAdminController extends Controller
{
    public function sub_index()
    {
        $admin =  $id = Session()->get('admin_id');
        if ($admin == "") {
            session()->flush();
            return redirect('/');
        } else {
            // $data['studentData'] = studentRegister::where(['status' => 1, ''])->count();
            $data['addSubAdmin'] = addSubAdmin::where(['id' => $id])->first();
            $data['studentData'] = studentRegister::where(['status' => 1, 'branch_id' => $data['addSubAdmin']['branch_id']])->count();
            $branchDetails = addSubAdmin::where(['id' => $admin])->first();
            $data['Publication'] = Publication::where(['branch_id' => $branchDetails->branch_id])->count();
            $data['punishment'] = punishment::where(['branch_id' => $branchDetails->branch_id])->count();
            $data['ParentMeeting'] = ParentMeeting::where(['branch_id' => $branchDetails->branch_id])->count();
            $data['calllog'] = calllog::where(['branch_id' => $branchDetails->branch_id])->count();
            $data['SchoolFee'] = SchoolFee::where(['branch_id' => $branchDetails->branch_id])->count();
            return view('Sub_Admin.index', $data);
        }
    }
    public function sub_admin_login()
    {
        // $a = 9;
        // $b = 9;
        // for ($i = 0; $i < $b; $i++) {
        //     for ($p = (2 * $i); $p < $a; $p++) {
        //         echo "&nbsp";
        //     }
        //         for ($k = 0; $k <= 2 * $i; $k++) {
        //             echo "*";
        //         }
        //     echo "<br>";
        // }

        // die();

        return view('Sub_Admin.login');
    }
    public function subAdminLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $addSubAdmin = addSubAdmin::where(['branch_id' => $username, 'pincode' => $password])->first();
        $userName  = addSubAdmin::where(['branch_id' => $username])->first();
        if ($addSubAdmin || isset($addSubAdmin)) {
            session()->put('admin_id', $addSubAdmin->id);
            session()->put('BranchId', $addSubAdmin->branch_id);
            echo "done";
        } else if (!$userName || !isset($userName)) {
            echo "branchId";
        } else {
            echo "not";
        }
    }
    public function logout_subadmin(Request $request)
    {
        session()->flush();
        return redirect('/');
    }
    public function student_Register(Request $request)
    {
        $id = base64_decode($request->id);
        $optionId = base64_decode($request->opId);
        $data['ClassOption'] = DB::table('add_classes')
            ->select('add_classes.id as ClassId', 'add_classes.add_class as ClassName', 'add_options.id as OptionId', 'add_options.option as OptionName')
            ->join('add_options', 'add_options.className', '=', 'add_classes.id')
            ->where('add_options.id', $optionId)
            ->first();

        $data['studentRegister'] = studentRegister::where('id', $id)->first();
        $data['all_class'] = AddClass::where(['status' => 1])->get();
        $data['all_option'] = AddOption::where(['status' => 1])->get();
        return view('Sub_Admin.student_Register', $data);
    }
    public function save_student_register(Request $request)
    {
        $branchId = session()->get('BranchId');
        $schoolFee =  SchoolFeeByAdmin::where(['Class' => $request->className, 'Option' => $request->option])->first();
        $rand = rand(1000, 9999);
        $studentData = $request->studentId;
        if ($studentData || isset($studentData)) {
            $table = studentRegister::find($studentData);
            $table->first_name = $request->first_name;
            $table->last_name = $request->last_name;
            $table->post_name = $request->post_name;
            $table->email = $request->email;
            $table->place = $request->place;
            $table->date_of_birth = $request->birth;
            $table->father = $request->father;
            $table->age = Carbon::parse($request->birth)->age;
            $table->mother = $request->mother;
            $table->telephone = $request->telephone;
            $table->mobile = $request->mobile;
            $table->student_class = $request->className;
            $table->student_option = $request->option;
            $table->schoolyear = $request->School;
            $table->save();
            echo "done";
        } else {
            $id = session()->get('admin_id');
            $addSubAdmin = addSubAdmin::where('id', $id)->first();
            $email = $request->email;
            $studentRegister = studentRegister::where(['email' => $email])->count();
            if ($studentRegister > 0) {
                echo "notDone";
            } else {
                $table = new studentRegister();
                $table->first_name = $request->first_name;
                $table->last_name = $request->last_name;
                $table->post_name = $request->post_name;
                $table->email = $request->email;
                $table->place = $request->place;
                $table->date_of_birth = $request->birth;
                $table->age = Carbon::parse($request->birth)->age;
                $table->father = $request->father;
                $table->mother = $request->mother;
                $table->telephone = $request->telephone;
                $table->mobile = $request->mobile;
                $table->schoolyear = $request->School;
                $table->student_class = $request->className;
                $table->student_option = $request->option;
                $table->branch_id = $branchId;
                $table->student_image = $branchId . $rand;
                $table->save();
                $school = new SchoolFee();
                $school->branch_id = $branchId;
                $school->student_id = $branchId . $rand;
                $school->student_name = $request->first_name . ' ' . $request->last_name;
                $school->class = $request->className;
                $school->option = $request->option;
                $school->balance = $schoolFee->SchoolFee;
                $school->amount_paid = '0';
                $school->outstanding_amount = '0';
                $school->save();
                echo "done";
            }
        }
    }
    public function studentList(Request $harsh)
    {
        $brandId = session()->get('BranchId');
        $classId = base64_decode($harsh->classId);
        $optionId = base64_decode($harsh->optionId);
        $data['ClassOptionName'] = DB::table('add_classes')
            ->select('add_classes.*', 'add_options.*')
            ->join('add_options', 'add_classes.id', '=', 'add_options.className')
            ->where('add_options.id', $optionId)
            ->first();
        $data['studentRegister'] = DB::table('student_registers')
            ->select('student_registers.*', 'add_options.id As OpId', 'add_options.option as OptionName', 'add_classes.id as ClassId', 'add_classes.add_class as ClassName')
            ->join('add_options', 'add_options.id', '=', 'student_registers.student_option')
            ->join('add_classes', 'add_classes.id', '=', 'student_registers.student_class')
            ->where('student_registers.branch_id', $brandId)
            ->where('student_registers.student_class', $classId)
            ->where('student_registers.student_option', $optionId)
            ->where('student_registers.status', '!=', 2)
            ->get();
        $data['optionId'] = $optionId;
        $data['classId'] = $classId;
        return view('Sub_Admin.studentList', $data);
    }
    public function delete_Student_Data(Request $request)
    {
        $id = base64_decode($request->key);
        if ($id || isset($id)) {
            studentRegister::where('id', $id)->delete();
            return redirect('studentList')->with('message', 'Student Successfully deleted');
        }
    }
    public function result_publication(Request $request)
    {
        $branchId = session()->get('admin_id');
        $branchDetails = addSubAdmin::where(['id' => $branchId])->first();
        // $data['Publication'] = Publication::where(['branch_id' => $branchDetails->branch_id])->get();
        $data['Publication'] = DB::table('publications')
            ->select('publications.*', 'add_classes.add_class as ClaaName', 'add_options.option as OptionName')
            ->join('add_classes', 'add_classes.id', '=', 'publications.class')
            ->join('add_options', 'add_options.id', '=', 'publications.option_name')
            ->where('publications.status', 1)
            ->get();
        return view('Sub_Admin.resultPublication', $data);
    }
    public function parent_meeting()
    {
        $branchId = session()->get('admin_id');
        $branchDetails = addSubAdmin::where(['id' => $branchId])->first();
        $data['ParentMeeting'] = ParentMeeting::where(['branch_id' => $branchDetails->branch_id])->get();
        $data['AddClass'] = AddClass::where(['status' => 1])->get();
        return view('Sub_Admin.parentMeeting', $data);
    }

    public function filterMeeting(Request $harsh)
    {
        $className = $harsh->className;
        $optionName = $harsh->optionName;
        $type = $harsh->typeMeeting;
        $branchId = session()->get('BranchId');
        if ($className || isset($className)) {
            $allOption =  AddOption::where(['className' => $harsh->className])->get();
            $allData = '';
            $allData .= '<select id="AddOption" class="form-control" onchange="addOptionMeeting()">
            <option disabled selected>Select Option</option>';
            foreach ($allOption as $val) {
                $allData .= '<option value="' . $val->id . '">' . $val->option . '</option>';
            }
            $allData .= '</select>';
            echo $allData;
        } else if ($optionName || isset($optionName)) {
            $allOption = studentRegister::where(['student_option' => $optionName, 'branch_id' => $branchId])->get();
            foreach ($allOption as $val) {
                $table = new ParentMeeting();
                $table->branch_id = $branchId;
                $table->student_id = $val->student_image;
                $table->student_name = $val->first_name . ' ' . $val->last_name;
                $table->class = $harsh->classNames;
                $table->option = $optionName;
                $table->type = $type;
                $table->save();
            }
            echo "done";
        }
    }


    public function call_log()
    {
        $branchId = session()->get('admin_id');
        $branchDetails = addSubAdmin::where(['id' => $branchId])->first();
        $data['calllog'] = calllog::where(['branch_id' => $branchDetails->branch_id])->get();
        return view('Sub_Admin.callLog', $data);
    }
    public function school_fee()
    {
        $branchId = session()->get('admin_id');
        $BranchDigitId = session()->get('BranchId');
        $data['totalClass'] = AddClass::where('status', 1)->get();
        $branchDetails = addSubAdmin::where(['id' => $branchId])->first();
        $data['SchoolFee'] = SchoolFee::where(['branch_id' => $branchDetails->branch_id])->get();
        return view('Sub_Admin.schoolFee', $data);
    }

    public function filterDeposit(Request $request)
    {
        $StudentId = $request->StudentId;
        $amount = $request->amount;
        $studentData = SchoolFee::where(['student_id' => $StudentId])->first();
        if ($studentData || isset($studentData)) {
            $totalPaid = $amount + $studentData->amount_paid;
            if ($totalPaid <= $studentData->balance) {
                if ($amount <= $studentData->balance) {
                    $table = SchoolFee::find($studentData->id);
                    $table->amount_paid = $amount;
                    $table->amount_paid = $amount + $studentData->amount_paid;
                    $table->outstanding_amount = $studentData->balance - $totalPaid;
                    $table->save();
                    $studentRegister = studentRegister::where(['student_image' => $table->student_id])->first();
                    $email = $studentRegister->email;
                    $data = ['email' => $email, 'name' => $studentRegister->first_name, 'class' => '4th', 'paid' => $table->amount_paid, 'total' => $table->balance, 'ramaing' => $table->outstanding_amount];
                    Mail::send('Admin.MailSend.schoolfee', $data, function ($message) use ($email, $data) {
                        $message->to($email, 'School Fee')
                            ->subject('Student Pos');
                        $message->from('mobappssolutions154@gmail.com', 'Student POS');
                    });
                    $sums = $table->mailSend;
                    $table = SchoolFee::find($table->id);
                    $table->mailSend = ++$sums;
                    $table->save();
                    echo "done";
                }
            } else {
                echo "greater";
            }
        } else {
            echo "invalid";
        }
    }

    public function sendRemainderMailallStudent(Request $harsh)
    {
        $branchId = session()->get('BranchId');
        $school = SchoolFee::where(['branch_id' => $branchId])->get();
        foreach ($school as $val) {
            $studentRegister = studentRegister::where(['student_image' => $val->student_id])->first();
            $email = $studentRegister->email;
            $class = AddClass::where(['id' => $val->class])->first();
            $data = ['email' => $email, 'name' => $studentRegister->first_name, 'class' => $class->add_class, 'ramaing' => $val->outstanding_amount];
            Mail::send('Admin.MailSend.remainSchoolFee', $data, function ($message) use ($email, $data) {
                $message->to($email, 'School Fee')
                    ->subject('Student Pos');
                $message->from('mobappssolutions154@gmail.com', 'Student POS');
            });
            $sum = $val->remain;
            $table = SchoolFee::find($val->id);
            $table->remain = ++$sum;
            $table->save();
        }
        echo "done";
    }

    public function punishment()
    {
        $branchId = session()->get('admin_id');
        $branchDetails = addSubAdmin::where(['id' => $branchId])->first();
        // $data['punishment'] = punishment::where(['branch_id' => $branchDetails->branch_id])->get();
        $data['punishment'] = DB::table('punishments')
            ->select('punishments.*', 'add_classes.id as ClassId', 'add_classes.add_class as ClassName', 'add_options.id as OptionId', 'add_options.option as optionName')
            ->join('add_classes', 'punishments.class', '=', 'add_classes.id')
            ->join('add_options', 'punishments.option', '=', 'add_options.id')
            ->get();
        return view('Sub_Admin.punishment', $data);
    }
    public function profilePage()
    {
        $id = session()->get('admin_id');
        $data['branchData'] = addSubAdmin::where(['id' => $id])->first();
        return view('Sub_Admin.profilePage', $data);
    }
    public function changePassword()
    {
        $id = session()->get('admin_id');
        $data['branchData'] = addSubAdmin::where(['id' => $id])->first();
        return view('Sub_Admin.changePassword', $data);
    }
    public function resultMailByBranch(Request $request)
    {
        $StudentId = $request->StudentId;
        $branchId = session()->get('BranchId');
        $publication = Publication::where(['branch_id' => $branchId, 'student_id' => $StudentId])->first();
        if ($publication || isset($publication)) {
            $class = AddClass::where(['id' => $publication->class])->first();
            $studentRegister = studentRegister::where(['student_image' => $StudentId])->first();
            $email = $studentRegister->email;
            $data = ['email' => $email, 'father' => $studentRegister->father, 'name' => $studentRegister->first_name, 'class' => $class->add_class, 'obtained' => $publication->percentage, 'place_occupied' => $publication->place_occupied];
            Mail::send('Admin.MailSend.parentMeeting', $data, function ($message) use ($email, $data) {
                $message->to($email, 'School Fee')
                    ->subject('Student Pos');
                $message->from('mobappssolutions154@gmail.com', 'Student POS');
            });
            $sum = $publication->mailSend;
            $table = Publication::find($publication->id);
            $table->mailSend = ++$sum;
            $table->save();
            echo "done";
        } else {
            echo "InvalidId";
        }
    }

    public function resultSendMailAllStudent(Request $request)
    {
        $branchId = session()->get('BranchId');
        $allStudent =  Publication::where(['branch_id' => $branchId, 'status' => 1])->get();
        foreach ($allStudent as $val) {
            $publication = Publication::where(['branch_id' => $branchId, 'student_id' => $val->student_id])->first();
            $class = AddClass::where(['id' => $publication->class])->first();
            $studentRegister = studentRegister::where(['student_image' => $val->student_id])->first();
            $email = $studentRegister->email;
            $data = ['email' => $email, 'father' => $studentRegister->father, 'name' => $studentRegister->first_name, 'class' => $class->add_class, 'obtained' => $publication->percentage, 'place_occupied' => $publication->place_occupied];
            Mail::send('Admin.MailSend.parentMeeting', $data, function ($message) use ($email, $data) {
                $message->to($email, 'School Fee')
                    ->subject('Student Pos');
                $message->from('mobappssolutions154@gmail.com', 'Student POS');
            });
            $sum = $publication->mailSend;
            $table = Publication::find($publication->id);
            $table->mailSend = ++$sum;
            $table->save();
        }
        echo "done";
    }

    public function sendMailMeeting(Request $harsh)
    {
        $id = $harsh->id;
        $studentRegister = studentRegister::where(['student_image' => $id])->first();
        $publication = ParentMeeting::where(['student_id' => $id])->first();
        $class = AddClass::where(['id' => $publication->class])->first();
        $email = $studentRegister->email;
        $data = ['email' => $email, 'father' => $studentRegister->father, 'name' => $studentRegister->first_name, 'class' => $class->add_class, 'obtained' => $publication->percentage, 'place_occupied' => $publication->place_occupied];
        Mail::send('Admin.MailSend.Meeting', $data, function ($message) use ($email, $data) {
            $message->to($email, 'School Fee')
                ->subject('Student Pos');
            $message->from('mobappssolutions154@gmail.com', 'Student POS');
        });
        $sum = $publication->mailSend;
        $table = ParentMeeting::find($publication->id);
        $table->mailSend = ++$sum;
        $table->save();
        echo "done";
    }
    public function sendMailforParentMeeting(Request $harsh)
    {
        $branchId = session()->get('BranchId');
        $allStudent =  ParentMeeting::where(['branch_id' => $branchId])->get();
        foreach ($allStudent as $val) {
            $publication = ParentMeeting::where(['branch_id' => $branchId, 'student_id' => $val->student_id])->first();
            $class = AddClass::where(['id' => $publication->class])->first();
            $studentRegister = studentRegister::where(['student_image' => $val->student_id])->first();
            $email = $studentRegister->email;
            $data = ['email' => $email, 'father' => $studentRegister->father, 'name' => $studentRegister->first_name, 'class' => $class->add_class, 'obtained' => $publication->percentage, 'place_occupied' => $publication->place_occupied];
            Mail::send('Admin.MailSend.Meeting', $data, function ($message) use ($email, $data) {
                $message->to($email, 'School Fee')
                    ->subject('Student Pos');
                $message->from('mobappssolutions154@gmail.com', 'Student POS');
            });
            $sum = $publication->mailSend;
            $table = ParentMeeting::find($publication->id);
            $table->mailSend = ++$sum;
            $table->save();
            echo "done";
        }
        echo "done";
    }
    public function profileChangePassword(Request $request)
    {
        $id = $request->ProfileId;
        $passwordChnage = addSubAdmin::where(['id' => $id, 'pincode' => $request->currentPassword])->first();
        if ($passwordChnage || isset($passwordChnage0)) {
            $table  = addSubAdmin::find($id);
            $table->pincode = $request->presentPassword;
            $table->save();
            echo "done";
        } else {
            echo "NotMatch";
        }
    }
    public function studentDetails(Request $request)
    {
        $id = base64_decode($request->id);
        $data['studentRegister'] = studentRegister::where(['id' => $id])->first();
        $data['Publication'] = Publication::where('student_id', $data['studentRegister']['student_image'])->first();
        $data['ParentMeeting'] = ParentMeeting::where('student_id', $data['studentRegister']['student_image'])->first();
        $data['calllog'] = calllog::where('student_id', $id)->orderBy('date', 'DESC')->get();
        $data['punishment'] = punishment::where('student_id', $data['studentRegister']['student_image'])->get();
        $data['SchoolFee'] = SchoolFee::where('student_id', $data['studentRegister']['student_image'])->first();
        return view('Sub_Admin.studentDetails', $data);
    }
    public function mailSchoolFee(Request $harsh)
    {
        $branchId = session()->get('BranchId');
        $id = $harsh->id;
        $name = $harsh->name;
        $countStudent = studentRegister::where(['branch_id' => $branchId, 'status' => 1])->count();
        $ParentMeeting = Publication::where(['student_id' => $id])->first();
        $SchoolFee = SchoolFee::where(['student_id' => $id])->first();
        $studentRegister = studentRegister::where(['student_image' => $id])->first();
        // $studentRegisterMeeting = studentRegister::where(['student_image' => $ParentMeeting->student_id])->first();
        $studentRegisterMeeting = DB::table('student_registers')
            ->select('student_registers.*', 'add_options.option as optionName', 'add_classes.add_class as className')
            ->join('add_options', 'student_registers.student_class', '=', 'add_options.id')
            ->join('add_classes', 'student_registers.student_option', '=', 'add_classes.id')
            ->where('student_registers.student_image', $ParentMeeting->student_id)
            ->first();
        $email = $studentRegister->email;
        $emails = $studentRegisterMeeting->email;
        if ($name == "deposite") {
            $data = ['email' => $email, 'name' => $studentRegister->first_name, 'class' => $studentRegisterMeeting->className, 'paid' => $SchoolFee->amount_paid, 'total' => $SchoolFee->balance, 'ramaing' => $SchoolFee->outstanding_amount];
            Mail::send('Admin.MailSend.schoolfee', $data, function ($message) use ($email, $data) {
                $message->to($email, 'School Fee')
                    ->subject('Student Pos');
                $message->from('mobappssolutions154@gmail.com', 'Student POS');
            });
            $sums = $SchoolFee->mailSend;
            $table = SchoolFee::find($SchoolFee->id);
            $table->mailSend = ++$sums;
            $table->save();
            echo "done";
        } else if ($name == "remain") {
            $data = ['email' => $email, 'name' => $studentRegister->first_name, 'class' => $studentRegisterMeeting->className, 'ramaing' => $SchoolFee->outstanding_amount];
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
        } else if ($name == "ParentMeeting") {
            // echo "d";

            $data = ['email' => $emails, 'father' => $studentRegisterMeeting->father, 'name' => $studentRegisterMeeting->first_name, 'class' => $studentRegisterMeeting->className, 'option' => $studentRegisterMeeting->optionName, 'obtained' => $ParentMeeting->percentage, 'place_occupied' => $ParentMeeting->place_occupied, 'TotalStudet' => $countStudent];
            Mail::send('Admin.MailSend.parentMeeting', $data, function ($message) use ($emails, $data) {
                $message->to($emails, 'result publication')
                    ->subject('Result Publication');
                $message->from('mobappssolutions154@gmail.com', 'Student POS');
            });
            $table = Publication::find($ParentMeeting->id);
            $table->mailSend = 1;
            $table->save();
            echo "done";
        }
    }
    public function ManageStudent()
    {

        $data['totalClass'] = DB::table('add_classes')
            ->select('add_classes.add_class', 'add_classes.id as ClassId', 'add_options.option', 'add_options.id as OptionId', 'add_options.className')
            ->join('add_options', 'add_options.className', '=', 'add_classes.id')
            ->where('add_classes.status', 1)
            ->get();

        return view('Sub_Admin.ManageStudent', $data);
    }

    public function filterOption(Request $harsh)
    {
        $selectClassOption = $harsh->selectClassOption;
        $optionlist = AddOption::where(['className' => $selectClassOption])->get();
        $listOption = "";

        $listOption .= '
        <div class="col-lg-6">
        <div class="form-floating mb-3">
        <select class="form-control" name="option">
        <option disabled selected>Sélectionnez une option</option>';
        foreach ($optionlist as $val) {
            $listOption .= '<option value="' . $val->id . '">' . $val->option . '</option>';
        }
        $listOption .= '</select>
        </div>';
        echo $listOption;
    }
    public function studentListByClass(Request $harsh)
    {
        $optionId = base64_decode($harsh->key);
        $classId = base64_decode($harsh->ClassId);
        $data['ClassName'] = DB::table('add_options')
            ->select('add_options.option as Option', 'add_options.id as Id', 'add_classes.add_class as Class')
            ->join('add_classes', 'add_classes.id', '=', 'add_options.className')
            ->where('add_options.id', $optionId)
            ->first();
        $data['studentList'] = studentRegister::where(['student_class' => $classId, 'student_option' => $optionId])->get();
        $data['studentListBranchId'] = studentRegister::where(['student_class' => $classId, 'student_option' => $optionId])->first();
        return view('Sub_Admin.studentListByClass', $data);
    }

    public function uploadExcel(Request $harsh)
    {
        $ClassNameByStudent = $harsh->ClassNameByStudent;
        $OptionNameByStudent = $harsh->OptionNameByStudent;
        session()->forget('OptionId');
        session()->forget('ClassId');
        session()->put('className', $ClassNameByStudent);
        session()->put('optionName', $OptionNameByStudent);
        Excel::import(new ResultImport, $harsh->file);
        return redirect('ManageStudent');
    }
    public function uploadResult(Request $harsh)
    {
        $optionId = base64_decode($harsh->key);
        $classId = base64_decode($harsh->ClassId);
        $Date = base64_decode($harsh->date);
        $data['ClassNameByStudentName'] = DB::table('add_options')
            ->select('add_options.option as Option', 'add_options.id as Id', 'add_classes.add_class as Class')
            ->join('add_classes', 'add_classes.id', '=', 'add_options.className')
            ->where('add_options.id', $optionId)
            ->first();
        $data['studentList'] = Publication::where(['class' => $classId, 'option_name' => $optionId, 'created_at' => $Date])->get();
        $data['studentListBranchId'] = studentRegister::where(['student_class' => $classId, 'student_option' => $optionId])->first();
        $data['OptionName'] = $optionId;
        $data['ClassName'] = $classId;
        return view('Sub_Admin.uploadResult', $data);
    }

    public function editResult(Request $harsh)
    {
        $data['view'] = $harsh->name;
        // $data['result'] = Publication::where(['id' => base64_decode($harsh->key)])->first();
        $data['result'] = DB::table('publications')
            ->select('publications.*', 'add_classes.add_class as ClassName', 'add_options.option as optionName')
            ->join('add_classes', 'publications.class', '=', 'add_classes.id')
            ->join('add_options', 'publications.option_name', '=', 'add_options.id')
            ->where('publications.id', base64_decode($harsh->key))
            ->first();
        return view('Sub_Admin.editResult', $data);
    }

    public function deleteAllData(Request $harsh)
    {
        $key = base64_decode($harsh->key);
        $model = 'App\Models\\' . base64_decode($harsh->model);
        $model::where(['id' => $key])->delete();
        return redirect('result_publication')->with('message', 'Data Successfully Deleted');
    }

    public function updateResult(Request $harsh)
    {
        $studentId = $harsh->studentId;
        $Publication = Publication::where(['id' => $studentId])->first();
        if ($Publication || isset($Publication)) {
            $table =  Publication::find($studentId);
            $table->percentage = $harsh->percentage;
            $table->place_occupied = $harsh->Occupied;
            $table->save();
            echo "done";
        } else {
            echo "invalid";
        }
    }

    public function statusChange(Request $harsh)
    {
        $id = $harsh->id;
        $ids = $harsh->ids;
        $modeName = 'App\Models\\' . $harsh->name;
        $data = $modeName::where(['id' => $id])->first();
        $datas = $modeName::where(['id' => $ids])->first();
        if ($ids || isset($ids)) {
            if ($datas->attendance == 0) {
                $table = $modeName::find($ids);
                $table->attendance = 1;
                $table->save();
                echo "done";
            } else if ($datas->attendance == 1) {
                $table = $modeName::find($ids);
                $table->attendance = 0;
                $table->save();
                echo "done";
            }
        } else {
            if ($data->participation == 0) {
                $table = $modeName::find($id);
                $table->participation = 1;
                $table->save();
                echo "done";
            } else if ($data->participation == 1) {
                $table = $modeName::find($id);
                $table->participation = 0;
                $table->save();
                echo "done";
            }
        }
    }

    public function AddPunishment(Request $request)
    {
        $studentId = $request->studentId;
        $punishmentDescription = $request->punishmentDescription;
        $branchId = session()->get('BranchId');
        $studentData = studentRegister::where(['branch_id' => $branchId, 'student_image' => $studentId])->first();
        if ($studentData || isset($studentData)) {
            $table = new punishment();
            $table->branch_id = $branchId;
            $table->student_id = $studentId;
            $table->student_name = $studentData->first_name . ' ' . $studentData->last_name;
            $table->class = $studentData->student_class;
            $table->option = $studentData->student_option;
            $table->type = $punishmentDescription;
            $table->save();
            echo "done";
        } else {
            echo "invalid";
        }
    }

    public function callLogPresent(Request $harsh)
    {
        $attendance = $harsh->switch_val;
        $dateStudent = $harsh->dateStudent;
        $everyId = $harsh->everyId;
        $branchId = session()->get('BranchId');
        $studentDetails = studentRegister::where(['student_image' => $everyId, 'branch_id' => $branchId, 'status' => 1])->first();
        if ($studentDetails || isset($studentDetails)) {
            $table = new calllog();
            $table->branch_id = $branchId;
            $table->student_id = $everyId;
            $table->student_name = $studentDetails->first_name . ' ' . $studentDetails->last_name;
            $table->class = $studentDetails->student_class;
            $table->option = $studentDetails->student_option;
            $table->date = $dateStudent;
            if ($attendance > 0) {
                $table->attendance = $attendance;
            } else {
                $table->attendance = 0;
            }
            $table->save();
            echo "done";
        } else {
            echo "invalid";
        }
    }

    public function manageStudentByClass()
    {
        $data['branchId'] = session()->get('BranchId');
        $data['ClassOption'] = DB::table('add_classes')
            ->select('add_classes.*', 'add_options.id as optionId', 'add_options.option as OptionName')
            ->join('add_options', 'add_options.className', '=', 'add_classes.id')
            ->where('add_classes.status', 1)
            ->get();
        return view('Sub_Admin.manageStudentByClass', $data);
    }

    public function deleteStudentByOption(Request $harsh)
    {
        $optionId = base64_decode($harsh->key);
        studentRegister::where(['student_option' => $optionId])->delete();
        calllog::where(['option' => $optionId])->delete();
        Publication::where(['option_name' => $optionId])->delete();
        punishment::where(['option' => $optionId])->delete();
        ParentMeeting::where(['option' => $optionId])->delete();
        return redirect('manageStudentByClass');
    }

    public function studentUpload(Request $harsh)
    {
        session()->forget('optionName');
        session()->forget('className');
        session()->put('OptionId', base64_decode($harsh->opId));
        session()->put('ClassId', base64_decode($harsh->classId));
        $data['studentRegister'] = studentRegister::where(['status' => 1])->get();
        return view('Sub_Admin.studentUpload', $data);
    }
    public function uploadExcelStudentRegistration(Request $harsh)
    {
        Excel::import(new ResultImport, $harsh->myfile);
        return redirect('manageStudentByClass');
    }

    public function ResultByDate(Request $harsh)
    {
        $OptionId = base64_decode($harsh->key);
        $ClassId = base64_decode($harsh->ClassId);
        $data['ClassOption'] = DB::table('add_options')
            ->select('add_options.id as OptionId', 'add_options.option as option', 'add_options.status as OptionStatus', 'add_classes.id as ClassId', 'add_classes.add_class as Class', 'add_classes.status as ClassStatus')
            ->join('add_classes', 'add_classes.id', '=', 'add_options.className')
            ->where('add_options.status', 1)
            ->where('add_options.id', $OptionId)
            ->first();
        $data['Publication'] = Publication::select('created_at', 'type')->where(['class' => $ClassId, 'option_name' => $OptionId])->distinct()->get();
        return view('Sub_Admin.ResultByDate', $data);
    }
}
