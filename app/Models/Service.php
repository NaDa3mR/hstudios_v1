<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable =['name', 'title', 'slug', 'meta_keyword', 'meta_description', 'meta_title', 'details'];
    protected $table = 'services';
}
