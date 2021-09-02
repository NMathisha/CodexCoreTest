<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

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


    public function ShowLogin()
    {

        return view('auth/login');

    }

    public function CheckLoginUser(Request $request)
    {
        $mail=$request->mail;
        $password=$request->password;

        $validated = $request->validate([
            'mail' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        $checkAdmin=Admin::where('email',$mail)->where('password',$password)->where('is_deleted',0)->first();
        // $ad_name=$checkAdmin->name;


        if($checkAdmin != null){
            $request->session()->put('admin', $checkAdmin->name);
            return response()->json("success");
        }
        else{
            return response()->json('invalied username or password!');
        }




    }
    public function logout()
    {

        Session::flush();

        return response()->json("success");

    }
}
