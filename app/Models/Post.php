<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//Soft Delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements HasMedia
{
    //
    use InteractsWithMedia, HasFactory, SoftDeletes;
    protected $table = 'posts';

    protected $fillable = ['user_id','title','slug','description','content','status','publish_date'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status',$status);
    }

    private static function taoSlugDuyNhat($title)
    {
        $slug = Str::slug($title);

        $countSlug = Post::where('slug','LIKE','$slug%')->count();

        return $countSlug ? "{$count}-".($count+1):$slug;
    }

    public static function boot()
    {   
        parent::boot();

        static::creating(function($post)
        {
            $post->slug = self::taoSlugDuyNhat($post->title);
        });

        static::updating(function($post)
        {
            $post->slug = self::taoSlugDuyNhat($post->title);
        });
    }

    public function getThumbnailAttribute()
    {
        return $this->getFirstMediaUrl('thumbnails') ?: asset('images/thumbnail_default.jpg');
    }
}
