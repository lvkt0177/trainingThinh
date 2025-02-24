<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Models\User;

use App\Jobs\EmailSignUpJob;
use Illuminate\Support\Facades\Validator;
use App\Mail\EmailSignUp;

class UserController extends Controller
{
    //
   

    public function showSignUp()
    {
        if(Auth::guard('user')->check())
        {
            return redirect()->route('training.home');
        }

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

        // dd($user);

        dispatch(new EmailSignUpJob($user));
        // $tieuDe = 'Đăng ký thành công';
        // $noiDung = 'Chao mung';
        // Mail::to($user->email)->send(new EmailSignUp($user, $tieuDe, $noiDung));
        
        return back()->with('success','Dang ky tai khoan thanh cong');
    }


    public function showProfile()
    {
        $user = Auth::guard('user')->user();

        return view('components.profile',compact('user'));
    }

    public function showEditProfile()
    {
        $user = Auth::guard('user')->user();
        return view('components.editprofile',compact('user'));
    }

    public function editProfile(Request $request)
    {
        $user = $request->only(['first_name','last_name','address']);

        $idUser = Auth::guard('user')->user()->id;

        $validated = Validator::make($user,[
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'address' => 'required|string|max:2000',
        ])->validate();
      
        User::where('id',$idUser)->update($validated);

        return back()->with('success','Cập nhật hồ sơ thành công');
    }

}
