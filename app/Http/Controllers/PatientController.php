<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Validator;
use App\Models\User;

  
// use App\Models\Patient;
// use App\Models\Vn_stat;
// use App\Models\Ovst;
// use App\Models\Visit_pttype_token_authen; 
use Http;
use SoapClient;
use File;
use SplFileObject;
use Arr;
use Storage;
use GuzzleHttp\Client;

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
        $data['users_prefix']       = DB::select('SELECT * FROM users_prefix'); 

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:8189/api/smartcard/read?readImageFlag=true",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $content = $response;
        $result = json_decode($content, true);

        @$pid            = $result['pid'];
        @$pname          = $result['titleName'];
        @$fname          = $result['fname'];
        @$lname          = $result['lname'];
        @$nation         = $result['nation'];
        @$birthDate      = $result['birthDate'];
        @$sex            = $result['sex'];
        @$transDate      = $result['transDate'];
        @$mainInscl      = $result['mainInscl'];
        @$subInscl       = $result['subInscl'];
        @$age            = $result['age'];
        @$checkDate      = $result['checkDate'];
        @$image          = $result['image'];
        @$correlationId  = $result['correlationId'];
        @$startDateTime  = $result['startDateTime'];
        @$claimTypes     = $result['claimTypes']; 
        $pid             = @$pid;
        $pname           = @$pname;
        $fname           = @$fname;
        $lname           = @$lname;
        $birthDate       = @$birthDate;
        $sex             = @$sex;
        $mainInscl       = @$mainInscl;
        $subInscl        = @$subInscl;
        $age             = @$age;
        $image           = @$image;
        $correlationId   = @$correlationId;


        return view('patient', $data,[
            'startdate'     => $startdate,
            'enddate'       => $enddate,
            'pid'           => $pid,
            'pname'         => $pname, 
            'fname'         => $fname, 
            'lname'         => $lname, 
            'birthDate'     => $birthDate,
            'sex'           => $sex,  
            'mainInscl'     => $mainInscl,
            'subInscl'      => $subInscl,
            'age'           => $age,
            'image'         => $image,
            'correlationId' => $correlationId,
        ]);
    }
    public function authencode_index(Request $request)
    {
        $ip = $request->ip(); 
        // $terminals = Http::get('http://localhost:8189/api/smartcard/terminals')->collect(); 
        // $cardcid = Http::get('http://localhost:8189/api/smartcard/read')->collect();  
        // $cardcidonly = Http::get('http://localhost:8189/api/smartcard/read-card-only')->collect(); 

        $terminals = Http::get('http://'.$ip.':8189/api/smartcard/terminals')->collect(); 
        $cardcid = Http::get('http://'.$ip.':8189/api/smartcard/read')->collect();  
        $cardcidonly = Http::get('http://'.$ip.':8189/api/smartcard/read-card-only')->collect(); 

        $output = Arr::sort($terminals);
        $outputcard = Arr::sort($cardcid);
        $outputcardonly = Arr::sort($cardcidonly);
        if ($output == []) {
            // if ($output == "") {
                $smartcard = 'NO_CONNECT';
                $smartcardcon = '';
            } else {
                $smartcard = 'CONNECT';
                foreach ($output as $key => $value) {
                    $terminalname = $value['terminalName'];
                    $cardcids = $value['isPresent']; 
                }
                if ($cardcids != 'false') {
                    $smartcardcon = 'NO_CID';
                } else {
                    $smartcardcon = 'CID_OK';
                }          
            }
            
        return view('authen.authencode',[  
            'smartcard'          =>   $smartcard, 
            'cardcid'            =>  $cardcid,
            'smartcardcon'       =>  $smartcardcon,
            'output'             =>  $output,
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
    public function patient_loadtable(Request $request)
    {
        $id               = $request->store_code;  
        $data_person      = DB::select('SELECT * FROM users ORDER BY id DESC');  
        // WHERE store_code = "'.$id.'"
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
                                <td>'.$value->fname.' - '.$value->lname.'</td>
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
