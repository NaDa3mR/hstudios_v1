<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['title', 'sub_title', 'slug', 'meta_keyword', 'meta_description', 'meta_title', 'details', 'is_active'];
    protected $table = 'blogs';
    public $timestamps = true;
}
