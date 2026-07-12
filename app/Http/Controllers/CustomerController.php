<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('menu')->orderBy('created_at', 'desc')->get();
        return view('dashboard_customer', compact('user', 'orders'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'bio' => 'nullable|string',
            'address' => 'nullable|string',
            'profile_pic' => 'nullable|image|max:2048'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->address = $request->address;

        if ($request->hasFile('profile_pic')) {
            if ($user->profile_pic) {
                Storage::delete('public/' . $user->profile_pic);
            }
            $path = $request->file('profile_pic')->store('profiles', 'public');
            $user->profile_pic = $path;
        }

        $user->save();

        return redirect()->back()->with('success_profile', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success_password', 'Password berhasil diubah!');
    }
}
