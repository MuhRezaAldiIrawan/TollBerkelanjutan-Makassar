<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB, Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

     public function register(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $password_confirmation = Hash::make($request->password_confirmation);
        $alamat = $request->alamat;
        $telp = $request->no_telp;

        $data = DB::table('users')
        ->where('email',$email)
        ->get();

        $message="";
        if(count($data)>0){
            $message = "email sudah terdaftar. silakan gunakan email yang lain";
            $status = "danger";
        }else{
            $data_detail = DB::table('user_detail')->where('no_telp',$telp)->get();
            if(count($data_detail)>0){
                $status = "danger";
                $message = "Nomor Telpon udah ada";
            }else{
                if(strlen($telp)<11){
                    $message = "Karakter No telpon kurang banyak";
                    $status = "danger";   
                }else{   
                    if($request->password_confirmation != $request->password){
                        $message = "Password gk sama";
                        $status = "danger";    
                    }else{
                        $id = DB::table('users')->insertGetId([
                            'name'=>$name,
                            'email'=>$email,
                            'password'=>$password
                        ]);

                        DB::table('user_detail')->insert([
                            'user_id'=>$id,
                            'alamat'=>$alamat,
                            'no_telp'=>$telp
                        ]);

                        $message = "mantap";
                        $status = "success";
                    }   
                }
            }
        }

        return redirect()->route('register')->with([$status=>$message]);
    }
}
