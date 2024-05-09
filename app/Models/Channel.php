<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function room_count()
    {
        return $this->hasMany(Room::class)->count();
    }
    public function program_count()
    {
        return $this->hasManyThrough(Program::class, Room::class)->count();
    }
}
