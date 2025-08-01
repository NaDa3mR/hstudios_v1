<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['name', 'email', 'phone', 'subject', 'message'];
    protected $table = 'contacts';
    public $timestamps = true;
}
