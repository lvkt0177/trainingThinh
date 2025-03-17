<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailPost;
use App\Jobs\PostsJob;

use App\Enums\UserStatus;

use App\Enums\PostsStatus;

class AdminController extends Controller
{
    //

    public function showDashboard(){
        return view('admin.dashboard');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    //Admin Post
    public function showPosts(){
        $posts = Post::with('user')->paginate(10);
        return view('admin.postsAdmin',compact('posts'));
    }

    public function searchPost(Request $request)
    {
        // dd($request->search);
        $search = $request->search ? "$request->search" : '';
         
        $query = Post::where('title','LIKE',"%$search%")
                    ->orWhereHas('user',fn($p) => $p->where('email', 'LIKE',"%$search%"));

        $posts = $query->orderBy('id','ASC')
                    ->paginate(15)
                    ->appends(['search' => $search]);

        return view('admin.postsAdmin',compact('posts','search'));
    }

    public function showEditPost($slug = null){
        if(!$slug)
        {
            return redirect()->route('admin.posts')->with('error','Có lỗi xảy ra. Không tìm thấy bài viết');
        }

        $post = Post::where('slug',$slug)->first();
        $postsStatus = PostsStatus::cases();
        
        if($post)
            return view('admin.editPosts',compact('post','postsStatus'));
        else
            return redirect()->route('admin.posts')->with('error','Có lỗi xảy ra. Không tìm thấy bài viết');
    }

    public function editPost(PostRequest $request)
    {
        // dd($request);
        $post = Post::where('slug',$request->slug)->first();
        $user_Email = User::where('id',$post->user_id)->first()->email;
        if(!$post)
        {
            return back()->with('error','Có lỗi xảy ra.');
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->publish_date = $request->publish_date;

        $post->save();

        if($request->status == 1)
        {
            dispatch(new PostsJob($post));
        }

        if($request->hasFile('thumbnail'))
        {
            $post->clearMediaCollection('thumbnails');

            $post->addMedia($request->file('thumbnail'))
                ->toMediaCollection('thumbnails', 'media-library');
        }

        return redirect()->route('admin.posts')->with('success','Cập nhật bài viết thành công');
    }

    //--------------------------------------------------------------------------------------------------------------
    //Admin Users
    public function showUsers(){
        $users = User::paginate(10);
        return view('admin.usersAdmin',compact('users'));
    }

    public function showEditUser($id = null)
    {
        if(!$id)
        {
            return redirect()->route('admin.users')->with('error','Có lỗi xảy ra. Không tìm thấy người dùng');
        }

        $user = User::where('id',$id)->first();
        $userStatus = UserStatus::cases();
        if($user)
            return view('admin.editUser',compact('user','userStatus'));
        else
            return redirect()->route('admin.users')->with('error','Có lỗi xảy ra. Không tìm thấy người dùng');
    }

    public function editUser(UserRequest $request)
    {
        $data = $request->only(['id','first_name','last_name','address','status']);
        // dd($data);
        $user = User::find($data['id']);

        if(!$user)
        {
            return back()->with('error','Có lỗi xảy ra.');
        }

        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->status = $data['status'];
        $user->address = $data['address'];
        $user->save();

        return redirect()->route('admin.users')->with('success','Cập nhật người dùng thành công');
    }

    public function searchUser(Request $request)
    {
        $search = $request->search ? "$request->search" : '';
        if($request->type_search == 'hoTen')
        {
            $users = User::where('first_name','LIKE',"%$search%")
            ->orWhere('last_name','LIKE',"%$search%")
            ->orderBy('status','ASC')
            ->paginate(20);
        }   
        else if($request->type_search == 'email')
        {
            $users = User::where('email','LIKE',"%$search%")
                    ->orderBy('status','ASC')
                    ->paginate(20);
        }
        else
        {
            $users = User::paginate(15);
        }

        return view('admin.usersAdmin',compact('users'));
    }


}
