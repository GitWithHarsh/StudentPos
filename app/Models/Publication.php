<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'student_id',
        'child_name',
        'option_name',
        'class',
        'percentage',
        'place_occupied',
        'mailSend',
        'status',
        'type'
    ];
}
