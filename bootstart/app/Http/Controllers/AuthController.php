<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

// Show the login form
public function showLoginForm()
{
    return view('auth.login');
}

// Process the login form
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication successful
        return redirect('/home');
    } else {
        // Authentication failed
        return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
    }
}

// Show the registration form
public function showRegistrationForm()
{
    return view('auth.register');
}

// Process the registration form
public function register(Request $request)
{
    // Validation logic here

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->save();

    Auth::login($user);

    return redirect('/home');
}

// Logout the user
public function logout()
{
    Auth::logout();
    return redirect('/login');
}

}
