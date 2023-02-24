<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB, Hash, Validator, Session;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function showLoginForm(){

    //     return view('auth/login');
    // }

    // public function login(Request $request){

    //     $data = array(
    //         'email'=>$request->get('email'),
    //         'password'=>$request->get('password')
    //     );

    //     if(Auth::attempt($data)){
    //         return redirect()->route('home')->with(['success'=>"Selamat Datang ".Auth::user()->name]);
    //     }else{
    //         $datas = DB::table('users')->where('email', $request->email)->get();
    //         if(count($datas)>0){
    //             $status = "danger";
    //             $message = "Password Salah";
    //         }else{
    //             $status = "danger";
    //             $message = "email tidak ada";
    //         }
    //         return redirect()->route('login')->with($status,$message);
    //     }
    // }

    public function authenticated(Request $request, $user)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            if ($user->hasRole('aktif')){
                $request->session()->regenerate();
 
                return redirect()->intended('/mmn-harian')->with(['success'=>"Selamat Datang ".Auth::user()->name]);
            }else{
                
                Auth::logout();
    
                $request->session()->invalidate();
            
                $request->session()->regenerateToken();
            
                return redirect('login')->with(['success'=>'Anda Tidak Memiliki Akses ke Web Ini']);
            }
        }else{
            $datas = DB::table('users')->where('email', $request->email)->get();
            if(count($datas)>0){
                $status = "danger";
                $message = "Password Salah";
            }else{
                $status = "danger";
                $message = "email tidak ada";
            }
            return redirect()->route('login')->with($status,$message);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('login')->with(['success'=>'thank you for using our service']);
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('aktif')){
    //         $request->session()->regenerate();
    //         return redirect()->route('home');
    //     }

    //     return redirect()->route('register');
    // }
}
