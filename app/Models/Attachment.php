<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename',
        'file_type',
        'path',
        'attachable_id',
        'attachable_type'
    ];

    /**
     * Get the parent attachable model (e.g., project or other model).
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
