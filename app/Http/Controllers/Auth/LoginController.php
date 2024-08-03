<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('public.user.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email'=>['required', 'email'],
            'password'=>'required|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/'
        ]);
        if(Auth::attempt($data)){
            // dd(Auth::user()->name);
            return redirect()->route('home');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function verify($token){
        $user = User::query()
        ->where('email_verified_at', null)
        ->where('email', base64_decode($token))
        ->first();
        // dd($user);
     
            $user->update([
                'email_verified_at'=>Carbon::now()
            ]);
        
        return redirect()->route('home');
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login');
        }else{
              return redirect()->route('login');
        }
    }
}
