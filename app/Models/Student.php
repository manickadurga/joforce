<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'rollno', 'email', 'password', 'phoneno', 'marks', 'total', 'grade','active'];

    protected $casts = [
        'marks' => 'array',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
