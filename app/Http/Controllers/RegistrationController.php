<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function currentUserRegistrations()
    {   
        $user = auth()->user();
        $registrations = $user->registrations;
        $registrationsWithEvent = $registrations->load('event');
        return view('dashboard-personal', ['registrations' => $registrationsWithEvent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
//         request: 
// Symfony\Component\HttpFoundation
// \
// InputBag {#40 ▼
//     #parameters: array:2 [▼
//       "_token" => "1ZKugVFnaTOUsSEQNOioU9wWruGoP6WZ2raGjyuF"
//       "event_id" => "1"
//     ]
//   }

        $request->validate([
            'event_id' => 'required|exists:events,id'
        ]);

        $event = Event::find($request->event_id);
        if ($event->registrations->contains('user_id', $request->user()->id)) {
            return redirect()->route('dashboard.personal');
        }
        $user = $request->user();
        $user->registrations()->create([
            'event_id' => $event->id,
            'registered_at' => now()
        ]);

        return redirect()->route('dashboard.personal');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
