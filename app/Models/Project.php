<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [
        'name',
        'description',
        'cover_image'

    ];

    // un project ha un type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
