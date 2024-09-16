<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'title', // Title of the project type
    ];

    // Relationships
    public function userProjects()
    {
        return $this->hasMany(UserProject::class);
    }
}
