<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'password', 'company_name', 'company_field'];
    protected $table = 'clients';
    protected $hidden = 'password';
    public $timestamps = true;

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }



}
