<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class D_api12002_pat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'd_api12002_pat';
    protected $primaryKey = 'd_api12002_pat_id';
    protected $fillable = [
        'blobName',
        'blobType',
        'blob'         
    ];

  
}