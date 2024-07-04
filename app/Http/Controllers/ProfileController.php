<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $request->validate([
            'birth_date' => 'nullable|date',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'nik' => 'nullable|string|max:16',
        ]);

        $user->update([
            'birth_date' => $request->input('birth_date'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'nik' => $request->input('nik'),
        ]);

        if ($user->role == 'patient') {
            Patient::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'birth_date' => $request->input('birth_date'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'nik' => $request->input('nik'),
                ]
            );
        }

        if ($user->role == 'doctor') {
            Doctor::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'birth_date' => $request->input('birth_date'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'nik' => $request->input('nik'),
                ]
            );
        }

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }
}
