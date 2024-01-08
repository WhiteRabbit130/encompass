<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Addresses extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'user_id', 'address'
    ];



}
