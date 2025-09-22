<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $client = Auth::guard('client')->user();
        return view('clients-dashboard.profile', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
        ]);


        $client->update($request->all());

        if ($request->hasFile('image')) {
                $client->clearMediaCollection('client_images');
                $client->addMediaFromRequest('image')->toMediaCollection('client_images');
            }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    public function updatePassword(Request $request)
    {
        $client = auth('client')->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if (!Hash::check($request->current_password, $client->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $client->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully!');
    }
}
