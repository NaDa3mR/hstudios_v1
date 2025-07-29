<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['param', 'ar', 'fr', 'en', 'wordable_type', 'wordable_id'];
    protected $table = 'words';
    protected $timestamps = true;

}
