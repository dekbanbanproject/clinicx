<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Validator;
use App\Models\User;
use App\Models\Acc_debtor;
use App\Models\Pttype_eclaim;
use App\Models\Account_listpercen;
use App\Models\Leave_month;
use App\Models\Acc_debtor_stamp;
use App\Models\Acc_debtor_sendmoney;
use App\Models\Pttype;
use App\Models\Pttype_acc;
use App\Models\Acc_stm_ti;
use App\Models\Acc_stm_ti_total;
use App\Models\Acc_opitemrece;
use App\Models\Acc_1102050101_202;
use App\Models\Acc_1102050101_217;
use App\Models\Acc_1102050101_2166;
use App\Models\Acc_stm_ucs;
use App\Models\Acc_1102050101_301;
use App\Models\Acc_1102050101_304;
use App\Models\Acc_1102050101_308;
use App\Models\Acc_1102050101_4011;
use App\Models\Acc_1102050101_3099;
use App\Models\Acc_1102050101_401;
use App\Models\Acc_1102050101_402;
use App\Models\Acc_1102050102_801;
use App\Models\Acc_1102050102_802;
use App\Models\Acc_1102050102_803;
use App\Models\Acc_1102050102_804;
use App\Models\Acc_1102050101_4022;
use App\Models\Acc_1102050102_602;
use App\Models\Acc_1102050102_603;
use App\Models\Acc_stm_prb;
use App\Models\Acc_stm_ti_totalhead;
use App\Models\Acc_stm_ti_excel;
use App\Models\Acc_stm_ofc;
use App\Models\acc_stm_ofcexcel;
use App\Models\Acc_stm_lgo;
use App\Models\Acc_stm_lgoexcel;
use App\Models\Check_sit_auto;
use App\Models\Acc_stm_ucs_excel;
use App\Models\D_ins;
use App\Models\D_pat;
use App\Models\D_opd;
use App\Models\D_orf;
use App\Models\D_odx;
use App\Models\D_cht;
use App\Models\D_cha;
use App\Models\D_oop; 
use App\Models\D_adp;
use App\Models\D_dru;
use App\Models\D_idx;
use App\Models\D_iop;
use App\Models\D_ipd;
use App\Models\D_aer;
use App\Models\D_irf;

use App\Models\Dapi_ins;
use App\Models\Dapi_pat;
use App\Models\Dapi_opd;
use App\Models\Dapi_orf;
use App\Models\Dapi_odx;
use App\Models\Dapi_cht;
use App\Models\Dapi_cha;
use App\Models\Dapi_oop; 
use App\Models\Dapi_adp;
use App\Models\Dapi_dru;
use App\Models\Dapi_idx;
use App\Models\Dapi_iop;
use App\Models\Dapi_ipd;
use App\Models\Dapi_aer;
use App\Models\Dapi_irf;
use App\Models\Dapi_lvd;

use App\Models\Acc_function;

use App\Models\D_apiofc_ins;
use App\Models\D_apiofc_iop;
use App\Models\D_apiofc_adp;
use App\Models\D_apiofc_aer;
use App\Models\D_apiofc_cha;
use App\Models\D_apiofc_cht;
use App\Models\D_apiofc_dru;
use App\Models\D_apiofc_idx;  
use App\Models\D_apiofc_pat;
use App\Models\D_apiofc_ipd;
use App\Models\D_apiofc_irf;
use App\Models\D_apiofc_ldv;
use App\Models\D_apiofc_odx;
use App\Models\D_apiofc_oop;
use App\Models\D_apiofc_opd;
use App\Models\D_apiofc_orf;

use App\Models\Fdh_sesion;
use App\Models\Fdh_ins;
use App\Models\Fdh_pat;
use App\Models\Fdh_opd;
use App\Models\Fdh_orf;
use App\Models\Fdh_odx;
use App\Models\Fdh_cht;
use App\Models\Fdh_cha;
use App\Models\Fdh_oop; 
use App\Models\Fdh_adp;
use App\Models\Fdh_dru;
use App\Models\Fdh_idx;
use App\Models\Fdh_iop;
use App\Models\Fdh_ipd;
use App\Models\Fdh_aer;
use App\Models\Fdh_irf;
use App\Models\Acc_ofc_dateconfig;

use PDF;
use setasign\Fpdi\Fpdi;
use App\Models\Budget_year;
use Illuminate\Support\Facades\File;
use DataTables;
use Intervention\Image\ImageManagerStatic as Image;
use App\Mail\DissendeMail;
use Mail;
use Illuminate\Support\Facades\Storage;
use Auth;
use Http;
use SoapClient;
// use File;
// use SplFileObject;
use Arr;
use CURLFILE;
use GuzzleHttp\Client; 
use App\Imports\ImportAcc_stm_ti;
use App\Imports\ImportAcc_stm_tiexcel_import;
use App\Imports\ImportAcc_stm_ofcexcel_import;
use App\Imports\ImportAcc_stm_lgoexcel_import;
use App\Models\Acc_1102050101_217_stam;
use App\Models\Acc_opitemrece_stm; 
use SplFileObject;
use PHPExcel;
use PHPExcel_IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory; 
use App\Models\D_ofc_repexcel;
use App\Models\Onestop; 
use ZipArchive;  
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\If_;
use Stevebauman\Location\Facades\Location; 
use Illuminate\Filesystem\Filesystem;
 

date_default_timezone_set("Asia/Bangkok");


class OnestopController extends Controller
 {
    
    public function account_401_claim_detail(Request $request,$months,$year)
    {
        $datenow = date('Y-m-d');
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        // dd($id);
        $data['users'] = User::get();

        $data = DB::select('
        SELECT *
            from acc_debtor
            WHERE month(vstdate) = "'.$months.'" AND year(vstdate) = "'.$year.'" AND active_claim = "Y"
            GROUP BY vn
        ');
        // WHERE month(U1.vstdate) = "'.$months.'" and year(U1.vstdate) = "'.$year.'"
        return view('account_401.account_401_claim_detail', $data, [ 
            'data'          =>     $data,
            'startdate'     =>     $startdate,
            'enddate'       =>     $enddate
        ]);
    } 
    
    public function account_401_checksit(Request $request)
    {
        $datestart = $request->datestart;
        $dateend   = $request->dateend;
        $date      = date('Y-m-d');
        $id        = $request->ids;
        // $data_sitss = DB::connection('mysql')->select('SELECT vn,an,cid,vstdate,dchdate FROM acc_debtor WHERE account_code="1102050101.401" AND stamp = "N" GROUP BY vn');
        $data_sitss = Acc_debtor::whereIn('acc_debtor_id',explode(",",$id))->get();
        $token_data = DB::connection('mysql10')->select('SELECT * FROM nhso_token ORDER BY update_datetime desc limit 1');
        foreach ($token_data as $key => $value) { 
            $cid_    = $value->cid;
            $token_  = $value->token;
        }
        foreach ($data_sitss as $key => $item) {
            $pids = $item->cid;
            $vn   = $item->vn; 
            $an   = $item->an; 
                
                    $client = new SoapClient("http://ucws.nhso.go.th/ucwstokenp1/UCWSTokenP1?wsdl",
                        array("uri" => 'http://ucws.nhso.go.th/ucwstokenp1/UCWSTokenP1?xsd=1',"trace" => 1,"exceptions" => 0,"cache_wsdl" => 0)
                        );
                        $params = array(
                            'sequence' => array(
                                "user_person_id"   => "$cid_",
                                "smctoken"         => "$token_",
                                // "user_person_id" => "$value->cid",
                                // "smctoken"       => "$value->token",
                                "person_id"        => "$pids"
                        )
                    );
                    $contents = $client->__soapCall('searchCurrentByPID',$params);
                    foreach ($contents as $v) {
                        @$status = $v->status ;
                        @$maininscl = $v->maininscl;
                        @$startdate = $v->startdate;
                        @$hmain = $v->hmain ;
                        @$subinscl = $v->subinscl ;
                        @$person_id_nhso = $v->person_id;

                        @$hmain_op = $v->hmain_op;  //"10978"
                        @$hmain_op_name = $v->hmain_op_name;  //"รพ.ภูเขียวเฉลิมพระเกียรติ"
                        @$hsub = $v->hsub;    //"04047"
                        @$hsub_name = $v->hsub_name;   //"รพ.สต.แดงสว่าง"
                        @$subinscl_name = $v->subinscl_name ; //"ช่วงอายุ 12-59 ปี"

                        IF(@$maininscl == "" || @$maininscl == null || @$status == "003" ){ #ถ้าเป็นค่าว่างไม่ต้อง insert
                            $date = date("Y-m-d");
                          
                            Acc_debtor::where('vn', $vn)
                            ->update([
                                'status'         => 'จำหน่าย/เสียชีวิต',
                                'maininscl'      => @$maininscl,
                                'pttype_spsch'   => @$subinscl,
                                'hmain'          => @$hmain,
                                'subinscl'       => @$subinscl, 
                            ]);
                            
                        }elseif(@$maininscl !="" || @$subinscl !=""){
                           Acc_debtor::where('vn', $vn)
                           ->update([
                               'status'         => @$status,
                               'maininscl'      => @$maininscl,
                               'pttype_spsch'   => @$subinscl,
                               'hmain'          => @$hmain,
                               'subinscl'       => @$subinscl,
                           
                           ]); 
                                    
                        }

                    }
           
        }

        return response()->json([

           'status'    => '200'
       ]);

    }
    
    public function account_401_destroy_all(Request $request)
    {
        $id = $request->ids;
        Acc_debtor::whereIn('acc_debtor_id',explode(",",$id))->delete();               
        return response()->json([
            'status'    => '200'
        ]);
    }
   
    // ****************  *****************************
    public function onestop_serviceshow(Request $request)
    {
        $hn                 =  $request->hn_search;
        // dd($hn);
        $data_show          = User::where('hn',$hn)->first();
        $data_one           = Onestop::where('hn',$hn)->get();
        // dd($data_one);
        return response()->json([
            'status'        => '200',
            'data_show'     => $data_show, 
            'data_one'      => $data_one, 
        ]);
    }
    // public function onestop_vstdate(Request $request)
    // {
    //     $hn                 =  $request->hn_search; 
    //     // $data_show          = User::where('hn',$hn)->first();
    //     $data_one           = Onestop::where('hn',$hn)->get();
    //     // dd($data_one);
    //     return response()->json([
    //         'status'        => '200', 
    //         'data_one'      => $data_one, 
    //     ]);
    // }
    public function onestop_vstdate(Request $request)
    {
        $hn                 =  $request->hn_search;         
        $data_sub     = DB::select('SELECT * FROM onestop WHERE hn = "'.$hn.'" GROUP BY onestop_id ORDER BY onestop_id ASC');

        $output = '
        <table class="table table-sm table-bordered table-striped" style="width: 100%;">
            <thead>
                <tr>                  
                    <td style="text-align: center;border: 1px solid black;font-size: 13px;color:#6495ED;" >วันที่มารับบริการ</td> 
                </tr>
            </thead>
            <tbody id="myTable">';
                foreach ($data_sub as $item) { 

                $output .= '
                    <tr height="20">
                        <td class="text-font" style="border: 1px solid black;padding-left:10px;font-size: 13px;" align="center" >' . $item->vstdate . '</td>
                    </tr>';
                }
            $output .= '</tbody>
            </table>';
        echo $output;

    }
    public function onestop_service_save(Request $request)
    {   
        $year               = substr(date("Y"),2) + 43;
        $mounts             = date('m');
        $day                = date('d');
        $time               = date("His");
        $ti                 = $request->vsttime;
        $pattern_time = '/:/i';
        $time_preg = preg_replace($pattern_time, '', $ti);
        $vn                 = $year.''.$mounts.''.$day.''.$time_preg;
          
        Onestop::insert([
                'vn'         => $vn,
                'hn'         => $request->hn,
                // 'fname'      => $request->fname,
                // 'lname'      => $request->lname,
                // 'cid'        => $request->cid,
                'height'     => $request->height,
                'weight'     => $request->weight,
                'pressure'   => $request->pressure,
                'pulse'      => $request->pulse,
                'vstdate'    => $request->datepicker,
                'vsttime'    => $request->vsttime,
                'congenital' => $request->congenital,
                'cc'         => $request->cc,  
            ]);
       
        return response()->json([
            'status'     => '200'
        ]);
        
    }
    
    

 }