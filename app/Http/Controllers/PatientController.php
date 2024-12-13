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
                 <table id="example" class="table table-sm table-striped dt-responsive nowrap w-100">                                              
                        <thead>  
                                 <tr>
                                        <th width="5%" class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">ลำดับ</th>
                                        <th width="10%" class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">hn</th>
                                        <th width="10%" class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">cid</th>
                                        <th class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">ชื่อ-นามสกุล</th>
                                        <th width="40%" class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">สิทธิ์</th>
                                        <th width="10%" class="text-center" style="background-color: rgb(222, 201, 248);font-size: 12px;">สถานะ</th>
                                </tr>  
                        </thead>
                    <tbody id="myTable">
                        ';
                
                        $i = 1;
                        foreach ($data_person as $key => $value) {
                            
                            $output.=' 
                              <tr id="tr_'.$value->id.'">
                                <td width="5%" class="text-center">'.$i++.'</td> 
                                <td width="10%" class="text-center">'.$value->hn.'</td>
                                <td width="10%" class="text-center">'.$value->cid.'</td>
                                <td class="text-start">'.$value->fname.' - '.$value->lname.'</td>
                                <td width="40%" class="text-center">'.$value->pttype.'</td>      
                                <td width="10%" class="text-center">'.$value->active.'</td>                                                 
                            </tr>';
                        }
                    
                        $output.='
                    </tbody> 
                </table> 
                
        ';
        echo $output;        
    }
    public function patient_save(Request $request)
    {
        $pname_       = $request->pname;
        $fname       = $request->fname;
        $lname       = $request->lname;       
        $pttype      = $request->pttype;
        $cid         = $request->cid;
        $tel         = $request->tel;
        $ban_no      = $request->ban_no;
        $ban_name    = $request->ban_name;
        $province    = $request->province;
        $ampher      = $request->ampher;
        $tumbon      = $request->tumbon;
        $poscode     = $request->poscode;
        $maxnumber   = DB::table('users')->max('hn');
        $maxhn       =  $maxnumber+1;
        if ($pname_ !='') {
            $pname   = $request->pname;
        } else {
            $pname   = '';
        }
        
        // = DB::select('SELECT * FROM users_prefix'); 
        $check = User::where('cid',$cid)->count();
        if ($check > 0) {
            User::where('cid',$cid)->update([
                // 'hn'        => $maxhn,
                'pname'     => $pname,
                'fname'     => $fname,
                'lname'     => $lname,
                'pttype'    => $pttype,
                'tel'       => $tel,
                'ban_no'    => $ban_no,
                'ban_name'  => $ban_name,
                'province'  => $province,
                'ampher'    => $ampher,
                'tumbon'    => $tumbon,
                'poscode'   => $poscode 
            ]);
        } else {
            User::insert([
                'pname'     => $pname,
                'fname'     => $fname,
                'lname'     => $lname,
                'pttype'    => $pttype,
                'tel'       => $tel,
                'ban_no'    => $ban_no,
                'ban_name'  => $ban_name,
                'province'  => $province,
                'ampher'    => $ampher,
                'tumbon'    => $tumbon,
                'poscode'   => $poscode,
                'username'  => $cid, 
                'password'  => '$2y$12$lRkqzSStpWdPUvBRLBQ1n.EQXrsU3Ak2Qe1aX7qF57ZrPZ1HcHlOm', 
                'cid'       => $cid,
                'hn'        => $maxhn,

                
            ]);
        }
        
        $data['date_now']          = date('Y-m-d');
  
        $yy1                        = date('Y') + 543;
        $yy2                        = date('Y') + 542;
        $yy3                        = date('Y') + 541;
        $data['m']                  = date('H');
        $data['mm']                 = date('H:m:s');
        $data['datefull']           = date('Y-m-d H:m:s');
        $months                     = date('m');
        $data['monthsnew']          = substr($months,1,2);  

        return response()->json([
            'status'     => '200'
        ]);
        
    }
}
