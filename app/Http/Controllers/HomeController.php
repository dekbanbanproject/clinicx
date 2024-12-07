<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Validator;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
    public function admin_main(Request $request)
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
        // $bgs_year      = DB::table('budget_year')->where('years_now','Y')->first();
        // $bg_yearnow    = $bgs_year->leave_year_id;
    
        
        // $data['wh_stock_list'] = DB::table('wh_stock_list')->where('stock_type','=','1')->get();
        // $data_edit             = DB::table('wh_request')->where('wh_request_id','=',$id)->first();
        // $data['stock_name']    = $data_main->stock_list_name;

        return view('admin_main', $data,[
            'startdate'   => $startdate,
            'enddate'     => $enddate,
            // 'bg_yearnow'  => $bg_yearnow,
        ]);
    }
}
