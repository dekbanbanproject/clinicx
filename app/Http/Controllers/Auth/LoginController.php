<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;
use Storage;
use File;
use Artisan;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $res)
    {
        $input = $res->all();

        $this->validate($res,[
            // 'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ]);
        if (auth()->attempt(array('username'=>$input['username'],'password'=>$input['password']))) {
           if (auth()->user()->type == 'ADMIN') {
               return redirect()->route('admin_main');
            } elseif(auth()->user()->type == 'STAFF') {
                return redirect()->route('staff_main');
            // } elseif(auth()->user()->type == 'MANAGE') {
            //     return redirect()->route('manage.home');     
            // } elseif(auth()->user()->type == 'USER') {
            //     return redirect()->route('user.home');  
            // } elseif(auth()->user()->type == 'RPST') {
            //     return redirect()->route('rpst.home_rpst');  
            // } elseif(auth()->user()->type == 'SUPPLIES') {
            //     // return redirect()->route('manage.home_supplies');      
            //     return redirect()->route('manage.home_supplies_mobile');    
           } else {
                return redirect()->route('home');
           }
        }else{
            return redirect()->route('login')->with('error','username and password Incorrect');
        }       
    }
    public function logout() {
        Auth::logout();
  
        return redirect('login');
      }
}
