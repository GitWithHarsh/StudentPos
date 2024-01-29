<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentRegister extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'student_class',
        'student_option',
        'student_image',
        'first_name',
        'last_name',
        'post_name',
        'email',
        'age',
        'place',
        'date_of_birth',
        'father',
        'mother',
        'telephone',
        'mobile',
        'schoolyear',
    ];
}
