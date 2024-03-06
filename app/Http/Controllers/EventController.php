<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboardIndex()
    {
        $events = Event::all();
        return view('dashboard-events', ['events' => $events]);
    }

    public function index()
    {
        $events = Event::all();
        return view('events', ['events' => $events]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        // dd($request);
        // validation
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required',
        ], [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.max' => 'Il campo nome non può superare i 255 caratteri.',
            'description.required' => 'Il campo descrizione è obbligatorio.',
            'start_date.required' => 'Il campo data di inizio è obbligatorio.',
            'start_date.date' => 'Il campo data di inizio deve essere una data valida.',
            'end_date.required' => 'Il campo data di fine è obbligatorio.',
            'end_date.date' => 'Il campo data di fine deve essere una data valida.',
            'end_date.after_or_equal' => 'La data di fine deve essere successiva o uguale alla data di inizio.',
            'location.required' => 'Il campo luogo è obbligatorio.',
        ]);

        $event = Event::create([
            'name' => $request->name,
            'created_by' => $request->user()->id,
            'description' => $request->description,
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s'),
            'end_date' => Carbon::parse($request->end_date)->format('Y-m-d H:i:s'),
            'location' => $request->location
        ]);

        if ($event) {
            return redirect()->route('dashboard.events')->with('success', 'Evento creato con successo');
        } else {
            return redirect()->route('dashboard.events')->with('error', 'Si è verificato un errore durante la creazione dell\'evento');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Route::put('/events/{event}', [EventController::class, 'update'])
        // ->name('events.update');
        // update the event

        // validation
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required',
        ], [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.max' => 'Il campo nome non può superare i 255 caratteri.',
            'description.required' => 'Il campo descrizione è obbligatorio.',
            'start_date.required' => 'Il campo data di inizio è obbligatorio.',
            'start_date.date' => 'Il campo data di inizio deve essere una data valida.',
            'end_date.required' => 'Il campo data di fine è obbligatorio.',
            'end_date.date' => 'Il campo data di fine deve essere una data valida.',
            'end_date.after_or_equal' => 'La data di fine deve essere successiva o uguale alla data di inizio.',
            'location.required' => 'Il campo luogo è obbligatorio.',
        ]);


        $event = Event::find($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        $event->end_date = Carbon::parse($request->end_date)->format('Y-m-d H:i:s');
        $event->location = $request->location;
        $event->save();
        if ($event) {
            return redirect()->route('dashboard.events')->with('success', 'Evento modificato con successo');
        } else {
            return redirect()->route('dashboard.events')->with('error', 'Si è verificato un errore durante la modifica dell\'evento');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $event = Event::find($id);
        $event->delete();
        if ($event) {
            return redirect()->route('dashboard.events')->with('success', 'Evento eliminato con successo');
        } else {
            return redirect()->route('dashboard.events')->with('error', 'Si è verificato un errore durante l\'eliminazione dell\'evento');
        }
    }
}
