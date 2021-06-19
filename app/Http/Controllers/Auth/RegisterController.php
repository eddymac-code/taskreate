<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validate user
        $this->validate($request, [
            'name' => 'required|max:255',
            'gender' => 'required',
            'birthday' => 'required|date',
            'phone' => 'required|min:10',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
                  
        ]);

        // store user
        User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // sign user in
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $user = auth()->user();
        
        Mail::to($user->email)->send(new UserRegistered(auth()->user()));

        // redirect
        return redirect()->route('tasks.index');
    }
}
