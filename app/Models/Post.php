<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//Soft Delete
use Illuminate\Database\Eloquent\SoftDeletes;

//Trait
use App\Traits\HasSlug;
use App\Traits\HasAttribute;

//Enums
use App\Enums\PostsStatus;
class Post extends Model implements HasMedia
{
    //
    use InteractsWithMedia, HasFactory, SoftDeletes, HasSlug, HasAttribute;
    protected $table = 'posts';

    protected $fillable = ['user_id','title','slug','description','content','status','publish_date'];
    protected $casts = [
        'status' => PostsStatus::class,
    ];
    public $timestamps = true;
 
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status',$status);
    }



    
}
