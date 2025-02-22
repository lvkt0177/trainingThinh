<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

class UserController extends Controller
{
    //
   

    public function showSignUp()
    {
        return view('components.signup');
    }


    public function signUp(Request $request)
    {
        
        
        $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|email|max:100|unique:users|lowercase',
            'address' => 'required|string|min:5',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'address' => $request->address,
        ]);

        Mail::raw('Cảm ơn bạn đã đăng ký.', function ($message) use ($user) {
            $message->to($user->email)->subject('Chào bạn!');
        });
        
        return back()->with('success','Dang ky tai khoan thanh cong');
    }


    public function showAccount()
    {
        return view('training.account');
    }

}
