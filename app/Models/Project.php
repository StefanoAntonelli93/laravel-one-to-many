<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'cover_image',
        'type_id'


    ];

    // un progetto appartiene a un solo tipo
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // un progetto appartiene a un solo utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
