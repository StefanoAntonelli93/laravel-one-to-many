<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    // un type ha più project
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
