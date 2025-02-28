<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Mail\WelcomeMail;

use App\Jobs\EmailJob;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //

    public function showLogin()
    {
        return view('components.login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $account = $request->only('email','password');

        if(Auth::guard('user')->attempt($account))
        {
            $user = Auth::guard('user')->user();
            
            if($user->status == 0)
            {
                Auth::guard('user')->logout();
                return back()->with('error','Tai khoan dang cho phe duyet');
            }

            if($user->status == 2)
            {
                Auth::guard('user')->logout();
                return back()->with('error','Tai khoan bi tu choi dang nhap');
            }

            if($user->status == 3)
            {
                Auth::guard('user')->logout();
                return back()->with('error','Tai khoan da bi khoa');
            }

            if($user->status == 1)
            {
                return redirect()->route('training.home')->with('login','Dang nhap thanh cong');
            }

        }

        return back()->with('error','Dang nhap that bai');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return back()->with('logout','Dang xuat tai khoan thanh cong');
    }


    public function showForgotPassword()
    {
        return view('components.forgotPassword');
    }

    public function UserResetPassword(Request $request)
    {
        $email = $request->only('email');

        // dd($email);
        if($email)
        {
            $user = User::where('email',$email)->first();

            if($user)
            {
                dispatch(new EmailJob($user));

                return back()->with('success','Gửi email thành công. Xin vui lòng kiểm tra trong hộp thư.');
            }
        }

        return back()->with('error','Gửi email thất bại');
    }

    public function showResetPassword(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');


        return view('components.resetPassword',compact('email','token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
            'confirm_password' => 'required|string|same:password',
        ]);
        
        $status = Password::reset(
            $request->only('email','password','token'),
            function($user, $password)
            {
                $user->forceFill(
                    [
                        'password' => Hash::make($password)
                    ]
                )->save();
            }
        );

        return $status == Password::PASSWORD_RESET ? back()->with('success','Đổi mật khẩu thành công') : back()->with('error','Có lỗi xảy ra');

    }

}
