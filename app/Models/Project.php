<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'content', 'view_name', 'meta_keyword', 'meta_description', 'meta_title'];


public function services()
    {
        return $this->belongsToMany(Project::class, 'project_service');
    }
}
