<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', Auth::id());
        return view('users.profile', ['user' => $user])->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        User::where('id', Auth::id())->update($validated);
        return redirect()->back()->with('success', 'Profile Updated!');
    }

    public function update_pass(Request $request, $id)
    {
        $validated = $request->validate([
            'curr_pass' => ['required', function ($attribute, $value, $fail) {
                if(!Hash::check($value, Auth::user()->password)) {
                    $fail('Old Password didn\'t match');
                }
            }],
            'password' => 'required|min:8|string|different:curr_pass|confirmed',
        ]);

        User::where('id', Auth::id())->update(['password' => Hash::make($validated['password'])]);
        return redirect()->back()->with('success', 'Profile Updated!');
    }
    
    public function update_pass_index(Request $request, $id)
    {
        $user = User::where('id', Auth::id());
        return view('users.edit_pass', ['user' => $user])->with('user', Auth::user());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
