<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramRegistration extends Model
{
    use HasFactory;

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }
}
