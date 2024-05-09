<?php

namespace App\Models;

use App\Models\Channel as ModelsChannel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "organizer_id",
        "name",
        "slug",
        "date"
    ];

    public function registrationsCount()
    {
        // return $this->hasManyThrough(Registration::class, EventTicket::class, "event_id", "ticket_id");
        return $this->hasManyThrough(Registration::class, EventTicket::class, "event_id", "ticket_id")->count();
    }


    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
    public function event_tickets()
    {
        return $this->hasMany(EventTicket::class);
    }
    public function channels()
    {
        return $this->hasMany(ModelsChannel::class);
    }
}
