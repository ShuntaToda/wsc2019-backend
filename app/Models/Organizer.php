<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "email",
        "password_hash"
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
