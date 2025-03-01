<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Models\User;

use App\Jobs\EmailSignUpJob;
use Illuminate\Support\Facades\Validator;
use App\Mail\EmailSignUp;
//Form request
use App\Http\Requests\SignUpRequest;

class UserController extends Controller
{
    //
    public function showSignUp()
    {
        return view('components.signup');
    }


    public function signUp(SignUpRequest $request)
    {
        
        $data = $request->only(['first_name','last_name','email','password','address']);
        
        $user = User::create($data);

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

    public function editProfile(SignUpRequest $request)
    {
        $user = $request->only(['first_name','last_name','address']);

        $idUser = Auth::guard('user')->user()->id;
      
        User::where('id',$idUser)->update($user);

        return back()->with('success','Cập nhật hồ sơ thành công');
    }

  

}
