<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class NewsController extends Controller
{
    //
    public function showNews()
    {
        $posts = Post::where('status', 1)->orderBy('publish_date','desc')->get();


        if($posts)
            return view('components.news',compact('posts'));

    }

}
