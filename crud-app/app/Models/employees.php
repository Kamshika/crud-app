<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_no',
        'birth_date',
        'first_name',
        'last_name',
        'gender',
        'hire_date',
    ];
}
