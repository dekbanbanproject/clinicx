<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Onestop extends Authenticatable
{ 
    // protected $connection = 'mysql2';
    protected $table = 'onestop';
    protected $primaryKey = 'onestop_id';
    protected $fillable = [  
        'vn',
        'hn' 
    ];
    // public $timestamps = false;     
}
