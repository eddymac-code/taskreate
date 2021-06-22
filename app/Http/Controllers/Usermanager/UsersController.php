<?php

namespace App\Http\Controllers\Usermanager;

use App\Models\User;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('usermanager.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usermanager.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $user = auth()->user();
        
        Mail::to($user->email)->send(new UserRegistered($user));

        // redirect
        return redirect()->route('usermanager.users.index')->with('success', 'User Registered Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('usermanager.users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('usermanager.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // redirect
        return redirect()->route('usermanager.users.index')->with('success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return back()->with('success', 'User Removed Successfully');
    }
}
