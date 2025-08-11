<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = ['title', 'sub_title', 'slug', 'meta_keyword', 'meta_description', 'meta_title', 'details', 'is_active'];
    protected $table = 'blogs';
}
