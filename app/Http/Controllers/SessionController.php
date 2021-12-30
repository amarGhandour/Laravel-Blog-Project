<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'welcome back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Incorrect email or password.'
        ]);

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
