<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTicket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $event = Event::find($id);
        return view("tickets/create", compact("event"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        $request->validate([
            "name" => "required",
            "cost" => "required",
            "special_validity" => "",
        ]);

        $special_validity_result = null;
        if ($request->special_validity === "amount") {
            $special_validity_result = ["type" => "amount", "amount" => $request->amount];
        } else if ($request->special_validity === "date") {
            $special_validity_result = ["type" => "date", "date" => $request->valid_until];
        }

        EventTicket::create([
            "event_id" => $id,
            "name" => $request->name,
            "cost" => $request->cost,
            "special_validity" => json_encode($special_validity_result),
        ]);
        return redirect()->route("admin.event.show", $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventTicket $eventTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventTicket $eventTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventTicket $eventTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventTicket $eventTicket)
    {
        //
    }
}
