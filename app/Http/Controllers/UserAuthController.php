<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserAuthController extends Controller
{
    //

    public function showLogin()
    {
        return view('components.login');
    }

    public function  login(Request $request)
    {
        // dd($request);
        $account = $request->only('email','password');

        if(Auth::guard('user')->attempt($account))
        {
            $user = Auth::guard('user')->user();

            if($user->status == 1)
            {
                return back()->with('success','Dang nhap thanh congg');
            }

            if($user->status == 0)
            {
                return back()->with('error','Tai khoan dang cho phe duyet');
            }

            if($user->status == 2)
            {
                return back()->with('error','Tai khoan bi tu choi dang nhap');
            }

            if($user->status == 3)
            {
                return back()->with('error','Tai khoan da bi khoa');
            }

        }

        return back()->with('error','Dang nhap that bai');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return back()->with('logout','Dang xuat thanh cong');
    }

}
