<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){

            return redirect()->back();
        }
        return view('test.auth.login');
    }

    public function loginstore(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credientials = array('email'=>$request->email , 'password'=>$request->password);
        // dd($credientials);
        if(Auth::attempt($credientials)){
            return redirect('/')->with('success','Login has Been Successfully..!');
        }
        return redirect('auth/login')->with('error','Credientials does Not Matched..!');

    }

    public function logout(){

        Auth::logout();
        return redirect('auth/login');
    }

    public function register(){

        if(Auth::check())
        {
             return redirect()->back();
        }
        return view('test.auth.register');
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'name' => 'required',
            'phone' => 'required|max:11',
            'email' => 'required|email|unique:users',
            'c_password' => 'required|same:password',
        ], [
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'c_password.required' => 'Confirm Password is required.',
            'c_password.same' => 'Confirm Password must match the Password field.',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // dd($request);
        $create = new User();
        $create->name = $request->name;
        $create->phone = $request->phone;
        $create->email = $request->email;
        $create->password = Hash::make($request->password);
        $create->save();
        Auth::logout();
        return redirect('auth/login')->with('success','Registration has Been Succssfully!..');


    }
}
