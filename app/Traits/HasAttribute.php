<?php

namespace App\Traits;

use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

trait HasAttribute
{
    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('thumbnails') ?: asset('images/thumbnail_default.jpg')
        );
    }
    
}