<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard-participants', ['users' => $users]);
    }

    public function makeAdmin(Request $request)
    {   

        $user = User::find($request->user_id);
        if (!$user) {
            return redirect()->route('dashboard.participants')->with('error','Utente non trovato');
        }
        $user->role = 'admin';
        $user->save();
        return redirect()->route('dashboard.participants')->with('success','Utente promosso a amministratore');
    }
  
}
