<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserPasswordController extends Controller
{

    public function edit()
    {
        $user = Auth::user();  // Get the authenticated user
        // Check if the user is authenticated
        return view('setting', compact('user'));
    }

    //
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        // Validation rules
        $rules = [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ];

        // Validate the input
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('profile.setting', $user->id)
                ->withInput()
                ->withErrors($validator);
        }

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
                ->route('profile.setting', $user->id)
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('home')
            ->with('success', 'Password updated successfully.');
    }
}
