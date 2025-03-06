<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function Loginshow(){

        return view('login');
    }


    public function RegistrationShow(){

        return view ('registration');
    }



    public function ResgistrationIndex(Request $request){

        $validator=Validator::make($request->all(),[
       
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);

        if($validator->passes()){

            $user =new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->role='user';
            $user->save();

        return redirect()->route('account.Loginshow')->with('success', 'User Created successfully');
        }
        else{
            return redirect()->route('account.RegistrationShow')
            ->withInput()
            ->withErrors($validator);
        }

    }



    public function LoginIndex(Request $request){

        $validator=Validator::make($request->all(),[
       
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if($validator->passes()){

            if(Auth::attempt(['email' => $request->email,'password' => $request->password])){

                return redirect()->route('account.Dashboard');
            
        }
        else{
            return redirect()->route('account.Loginshow')->with('error', 'email or password wrong');
        }
    }
      else{
        return redirect()->route('account.Loginshow')
        ->withInput()
        ->withErrors($validator);
      }
     
    }

    public function logout(){

        Session::flush();
        Auth::logout();
        return redirect()->route('account.Loginshow');

    }

}
