<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        "event_id",
        "name",
        "cost",
        "special_validity"
    ];

    public $timestamps = false;

    public function registrations()
    {
        return $this->hasMany(Registration::class, "ticket_id");
    }
}
