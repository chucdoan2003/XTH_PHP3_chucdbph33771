<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showlogin(){
        return view('public.user.login');
    }
    public function login(Request $request){
        $data= $request->all();
        $user=User::query()->where('name', $data['name'])
                    ->where('password', $data['password'])->first();
        dd($user);
        session(['user'=>$user]);
        return view('public.home');
       
      
    }
    public function showregister(){
        return view('public.user.register');
    }
    public function register(Request $request){
       
        $data=$request->all();
        if($data['password']==$data['password2']){
            User::query()->create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>$data['password']
            ]);
            session()->flash('success', 'Đăng ký tài khoản thành công');
        }else{
            session()->flash('error', 'Đăng ký tài khoản không thành công');
        }
        return redirect()->route('auth.showregister');
    }
}
