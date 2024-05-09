<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        return view("events/index", compact("events"));
    }

    public function create()
    {
        return view("events/create");
    }
    public function store(Request $request)
    {

        $request->validate([
            "name" => "required",
            "slug" => "required|unique:events",
            "date" => "required",
        ]);

        $event = Event::create([
            "name" => $request->name,
            "slug" => $request->slug,
            "date" => $request->date,
            "organizer_id" => $request->user()->id
        ]);
        return redirect()->route("admin.event.show", $event->id);
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view("events/detail", compact("event"));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view("events/edit", compact("event"));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            "name" => "required",
            "slug" => "required|unique:events,slug," . $id,
            "date" => "required",
        ]);

        $event = Event::find($id);
        $event->update([
            "name" => $request->name,
            "slug" => $request->slug,
            "date" => $request->date,
        ]);
        return redirect()->route("admin.event.show", $event->id);
    }
}
