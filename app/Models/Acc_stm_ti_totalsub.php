<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Acc_stm_ti_totalsub extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'acc_stm_ti_totalsub';
    protected $primaryKey = 'acc_stm_ti_totalsub_id';
    protected $fillable = [
        'wkno',
        'HDBill_TBill_hcode', 
    ];

  
}