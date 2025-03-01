<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Post;

//Factory
use Database\Factories\PostFactory;

//Form Request
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    //
    public function showPosts()
    {
        $userID = Auth::guard('user')->user()->id;

        $user = User::find($userID);
            
        $posts = $user->posts()->orderBy('publish_date','desc')->paginate(6);

        // $posts = Post::where('user_id',$userID)->orderBy('publish_date','desc')->get();
    
        // dd($posts);

        if($posts)
            return view('components.posts',compact('posts'));
        else
            return view('components.posts');
    }

    public function showCreatePost()
    {
        return view('components.createPost');
    }

    public function createPost(PostRequest $request)
    {
        // dd($request);

        $userID = Auth::guard('user')->user()->id;

        $data = $request->only(['title','description','content','publish_date']);

        $createPost = Post::create($data + ['user_id' => $userID]);

        if ($request->hasFile('thumbnail'))
        {
            $createPost->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnails','media-library');
        }
        
        if($request->filled('thumbnail_url'))
        {
            $createPost->addMediaFromUrl($request->thumbnail_url)->toMediaCollection('thumbnails','media-library');
        }
        

        if($createPost)
            return redirect()->route('training.posts')->with('success','Tạo bài viết thành công');
    }

    public function createFakePost()
    {
        $userID = Auth::guard('user')->user()->id;
        Post::factory()->count(5)->create([
            'user_id' => $userID,
        ]);

        return redirect()->route('training.posts')->with('success','Tạo bài viết giả thành công');
    }

      //DETAIL
    public function details($slug = null)
    {
        if($slug == null)
        {
            return view('error.pageerror');
        }
        $userID = Auth::guard('user')->user()->id;

        $trashedPost = Post::withTrashed()->where('slug',$slug)->first();

        if($trashedPost != null && $trashedPost->user_id == $userID)
        {
            $post = $trashedPost;
            return view('components.postdetail',compact('post'));
        }
        else if($trashedPost)
        {
            return view('error.pageerror');
        }

        $post = Post::where('slug',$slug)->first();

        // dd($post->getFirstMediaUrl('thumbnails'));


        if($post->user_id != $userID)
        {
            return view('error.pageerror');
        }

        if($post)
            return view('components.postdetail',compact('post'));
        else
            return view('error.pageerror');
    }
    

    public function deletePost($slug = null)
    {
        if($slug == null)
        {
            return view('error.pageerror');
        }

        $post = Post::where('slug',$slug)->first()->delete();

        if($post)
            return redirect()->route('training.posts')->with('success','Xoá bài viết thành công');
        else
            return back()->with('error','Có lỗi xảy ra. Xoá bài viết thất bại');
    }

    public function deleteAllPost()
    {
        $userID = Auth::guard('user')->user()->id;
        if($userID == null)
        {
            return view('error.pageerror');
        }

        $user = User::find($userID);

        $post = $user->posts()->delete();

        if($post)
            return back()->with('success','Xoá tất cả bài viết thành công');
        else
            return back()->with('error','Có lỗi xảy ra. Xoá thất bại');
    }

    public function showEditPost($slug = null)
    {
        if($slug == null)
        {
            return view('error.pageerror');
        }

        $post = Post::where('slug',$slug)->first();

        if($post->publish_date != null)
            $post->publish_date = optional(Carbon::parse($post->publish_date))->format('Y-m-d');

        if($post)
            return view('components.editPost',compact('post'));
        else
            return view('error.pageerror');
    }

    public function editPost(PostRequest $request)
    {
        // dd($request);
        $userID = Auth::guard('user')->user()->id;

        $post = Post::where('slug',$request->slug)->first();

        if($post)
        {
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'publish_date' => $request->publish_date ? $request->publish_date : null,
            ]);

            if ($request->hasFile('thumbnail'))
            {
                $post->clearMediaCollection('thumbnail');

                $post->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnails','media-library');

            }

        }

        if($post)
            return redirect()->route('training.posts')->with('success','Chỉnh sửa bài viết thành công');
        else
            return back()->with('error','Có lỗi xảy ra. Chỉnh sửa bài viết thất bại');
    }

    public function showTrash()
    {
        $userID = Auth::guard('user')->user()->id;
        $trashedPost = Post::where('user_id',$userID)->onlyTrashed()->paginate(6);
        return view('components.postsDeleted',compact('trashedPost'));
    }


    public function restorePost(Request $request)
    {
        if($request == null)
        {
            return view('error.pageerror');
        }

        $post = Post::withTrashed()->where('slug',$request->slug)->restore();

        if($post)
            return back()->with('success','Khôi phục bài viết thành công');
        else
            return back()->with('error','Có lỗi xảy ra. Khôi phục bài viết thất bại');
    }   
}
