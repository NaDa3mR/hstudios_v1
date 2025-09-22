<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Authenticatable implements HasMedia
{
    use InteractsWithMedia;
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'company_name', 'company_field'];
    protected $table = 'clients';
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function serviceRequests()
    {
        return $this->hasMany(Service_Request::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }


}
