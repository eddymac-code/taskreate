<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.login');
    }
    
    // This logs in the user
    public function store(Request $request)
    {
        // validate user credentials
        $this->validate($request, [
            
            'email' => 'required|email',
            'password' => 'required',
                  
        ]);

        // Check whether attempt is successful
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('error', 'Invalid login details!');
        }
        else {
            return redirect()->route('tasks.index');
        }
    }
}
