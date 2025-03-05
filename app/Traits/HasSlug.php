<?php

namespace App\Traits;


use Illuminate\Support\Str;
use App\Models\Post;

trait HasSlug
{
    
    private static function taoSlugDuyNhat($title)
    {
        $slug = Str::slug($title);

        $countSlug = Post::where('slug','LIKE','$slug%')->count();

        return $countSlug ? "{$count}-".($count+1):$slug;
    }

    public static function bootHasSlug()
    {   

        static::creating(function($post)
        {
            $post->slug = self::taoSlugDuyNhat($post->title);
        });

        static::updating(function($post)
        {
            $post->slug = self::taoSlugDuyNhat($post->title);
        });
    }
}