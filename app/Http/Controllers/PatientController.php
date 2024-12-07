<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Validator;
use App\Models\User;

class PatientController extends Controller
{  
    public function patient(Request $request)
    {
        $startdate  = $request->datepicker;
        $enddate    = $request->datepicker2;
      
        $data['date_now']          = date('Y-m-d');
  
        $yy1                        = date('Y') + 543;
        $yy2                        = date('Y') + 542;
        $yy3                        = date('Y') + 541;
        $data['m']                  = date('H');
        $data['mm']                 = date('H:m:s');
        $data['datefull']           = date('Y-m-d H:m:s');
        $months                     = date('m');
        $data['monthsnew']          = substr($months,1,2); 
        $data['users_prefix']             = DB::select('SELECT * FROM users_prefix'); 


        return view('patient', $data,[
            'startdate'   => $startdate,
            'enddate'     => $enddate,
            // 'bg_yearnow'  => $bg_yearnow,
        ]);
    }
    public function patient_registry(Request $request)
    {
        $startdate  = $request->datepicker;
        $enddate    = $request->datepicker2;
      
        $data['date_now']          = date('Y-m-d');
  
        $yy1                        = date('Y') + 543;
        $yy2                        = date('Y') + 542;
        $yy3                        = date('Y') + 541;
        $data['m']                  = date('H');
        $data['mm']                 = date('H:m:s');
        $data['datefull']           = date('Y-m-d H:m:s');
        $months                     = date('m');
        $data['monthsnew']          = substr($months,1,2);  
        
        return view('patient_registry', $data,[
            'startdate'   => $startdate,
            'enddate'     => $enddate,
            // 'bg_yearnow'  => $bg_yearnow,
        ]);
    }
    public function onestop_service(Request $request)
    {
        $startdate  = $request->datepicker;
        $enddate    = $request->datepicker2;
      
        $data['date_now']          = date('Y-m-d');
  
        $yy1                        = date('Y') + 543;
        $yy2                        = date('Y') + 542;
        $yy3                        = date('Y') + 541;
        $data['m']                  = date('H');
        $data['mm']                 = date('H:m:s');
        $data['datefull']           = date('Y-m-d H:m:s');
        $months                     = date('m');
        $data['monthsnew']          = substr($months,1,2);  

        return view('onestop_service', $data,[
            'startdate'   => $startdate,
            'enddate'     => $enddate,
            // 'bg_yearnow'  => $bg_yearnow,
        ]);
    }
}
