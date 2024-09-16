<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'title',  // Title of the experience level (e.g., "Beginner", "Mid-level", "Expert")
        'rate',   // Rate for this experience level
        'duration', // Duration associated with this experience level
    ];

    // Relationships
    public function userProjects()
    {
        return $this->hasMany(UserProject::class);
    }
}
