<?php

namespace App\Imports;

use App\Models\Publication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\studentRegister;
use Session;
use Carbon\Carbon;

class ResultImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $rand = rand(1000, 9999);
        $optionId = Session()->get('OptionId');
        $classId = Session()->get('ClassId');
        $brachId = Session()->get('BranchId');
        $className = session()->get('className');
        $optionName = session()->get('optionName');
        if (!$classId || !isset($classId)) {
            $studentName = DB::table('student_registers')->where(['student_image' => $row['student_id']])->first();
            $result = DB::table('publications')->where(['student_id' => $row['student_id']])->count();
            if ($result > 0) {
                echo "update";
            } else if ($studentName || isset($studentName)) {
                if ($row['student_id'] != "") {
                    return new Publication([
                        "branch_id" => $brachId,
                        "student_id" => $row['student_id'],
                        "child_name" => $studentName->last_name,
                        "class" => $className,
                        "percentage" => $row['percentage'],
                        'option_name' => $optionName,
                        "place_occupied" => $row['place_occupied'],
                        "type" => $row['type'],
                        "mailSend" => 0,
                        "status" => 1
                    ]);
                }
            }
        } else {
            $date = $row['date_of_birth'];
            return new studentRegister([
                'branch_id' => $brachId,
                'student_class' => $classId,
                'student_option' => $optionId,
                'student_image' => $brachId . $rand,
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'post_name' => $row['post_name'],
                'email' => $row['email'],
                // 'age' => Carbon::parse($date)->age(),
                'place' => $row['place'],
                'date_of_birth' => $date,
                'father' => $row['father'],
                'mother' => $row['mother'],
                'telephone' => $row['telephone'],
                'mobile' => $row['mobile'],
                'schoolyear' => $row['schoolyear']
            ]);
        }
    }
}
