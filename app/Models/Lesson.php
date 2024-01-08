<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Lesson extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        "teacher_id",
        "student_id",
        "parent_id",
        "instrument_id",
        "price",
    ];
}
