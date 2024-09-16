<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserProject extends Model
{
    // Fillable fields for mass assignment
    protected $fillable = [
        'user_id',           // Foreign key for the user
        'project_type_id',   // Foreign key for the project type
        'experience_id',     // Foreign key for the experience level
        'project_name',      // Name of the project
        'description',       // Brief description of the project
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}