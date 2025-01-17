<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Register(){
        return view('User.Auth.Register');
    }

    public function UserRegister(Request $request)
    {
        $rules=[
            'name'=>'required|max:255|alpha',
            'email'=>'required|max:255|unique:users,email',
            'mobile'=>'required|min:10',
            'password'=>'required|confirmed|min:8|max:255',
        
        ];

        $Validator = Validator::make($request->all(),$rules);
        
        if(!$Validator->fails()){
            $date = now();
            $data =[
                'type'=> 'User',
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'password'=>Hash::make($request->input('password')),
                'created_at'=>$date,
            
            ] ;

            $result = DB::table('users')->insert($data);
            if($data>0){
                return response()->json(['status_code'=>1,'massage'=>'data inserted successfully']);
            }else{
                return response()->json(['status_code'=>0,'massage'=>'data not insert']);
            }
        }else{
            return response()->json(['status_code'=>2,'massage'=> $Validator->errors()->first()]);
        }
    }

    public function login()
    {
        return view('User.Auth.login');
    }

    public function getlogin(Request $request)
    {
        $rules=[
            'email'=>'required|max:255|unique:users,email',
            'password'=>'required|confirmed|min:8|max:255',
        ];

        $Validator = Validator::make($request->all(),$rules);
        
        if(!$Validator->fails()){
    
            return response()->json(['status_code'=>2,'massage'=> $Validator->errors()->first()]);
        }

        $data = $request->only('email','password');
        if(Auth::attempt($data))
        {
            $user = Auth::user();
            if($user->type=='User')
            {
                //current url
                return redirect()->intended(route('Shop'));

            }elseif($user->type=='Admin')
            {
                return redirect()->route('Admin.Dashboard');
            }
        }
    }
        
    public function Logout(Request $request)
    {
        Auth::Logout();
            session()->invalidate();
            session()->regenerateToken();
        return redirect()->route('Auth.login');
    }

        
    }
