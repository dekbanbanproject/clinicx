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
    public function load_data_table(Request $request)
    {
        $id               = $request->store_code;  
        $data_person      = DB::select('SELECT * FROM users WHERE store_code = "'.$id.'" ORDER BY wh_recieve_sub_id DESC');  
            
        $output='                    
                 <table id="scroll-vertical-datatable" class="table table-sm table-striped dt-responsive nowrap w-100">                                              
                        <thead>  
                                 <tr>
                                        <th width="5%" class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">ลำดับ</th>
                                        <th class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">hn</th>
                                        <th class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">cid</th>
                                        <th class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">ชื่อ-นามสกุล</th>
                                        <th class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">สิทธิ์</th>
                                        <th class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">สถานะ</th>
                                </tr>  
                        </thead>
                    <tbody>
                        ';
                
                        $i = 1;
                        foreach ($data_person as $key => $value) {
                            
                            $output.=' 
                              <tr id="tr_'.$value->id.'">
                                <td>'.$i++.'</td> 
                                <td>'.$value->hn.'</td>
                                <td>'.$value->cid.'</td>
                                <td>'.$value->fname.' - '.$value->fname.'</td>
                                <td>'.$value->pttype.'</td>  
                                <td>'.$value->pttype.'</td>       
                                <td>'.$value->active.'</td>                                                 
                            </tr>';
                        }
                    
                        $output.='
                    </tbody> 
                </table> 
                
        ';
        echo $output;        
    }
}
