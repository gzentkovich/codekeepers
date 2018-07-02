<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    /**
     * Update Password
     */
    public function updatePassword(Request $request, User $user)
    {
        //$user = User::findOrFail($user);

        $this->validate($request, [
            'password' => 'required_with:new_password|password|max:8',
            'new_password' => 'confirmed|max:8',
        ]);

        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            $request->session()->flash('success', 'Password updated');
            return redirect()->route('users.index');
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->route('users.index');
        }

    }
}
