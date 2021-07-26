<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome back!');
        }

        throw ValidationException::withMessages([
            'email' => 'The email id could not be verified.',
            'password' => 'The provided password does not belong to the given email id.'
        ]);
    }
}
