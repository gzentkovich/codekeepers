<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->orderBy('id')->paginate(5);
        return view('admin.users.index', compact('users'))->with('i', (request()->input('page',1) -1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$rolenames = ['Empty', 'Administrator', 'Author', 'Subscriber'];
        $rolenames = Role::orderBy('id', 'desc')->pluck('name','id');
        $activenames = ['Inactive', 'Active'];
        return view('admin.users.edit', compact('user', 'rolenames', 'activenames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        /*
         * $user->update($request->all()) is cleaner, but
         * just wanted to leave me an example that I can 
         * break it apart and be more specific if needed.
         */
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('users.index')
                         ->with('success', 'User was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
                         ->with('success', 'User was successfully deleted.');
    }

}
