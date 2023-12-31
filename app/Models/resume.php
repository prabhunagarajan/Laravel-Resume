<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    use HasFactory;
    protected $table = 'resumes';
    protected $fillable = [
        'name',
        'dob',
        'gender',
        'email',
        'phone',
        'city',
        'address',
        'experience',
        'education',
        'skills',
        'img',
    ];
}
