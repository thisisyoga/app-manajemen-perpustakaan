<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Buku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

public function index(Request $request)
    {
        $buku = Buku::with('ulasans',   'RelasiKategori')->paginate(5);
        return view('dashboard', compact('buku'));
    }
    /**
     * Display the user's profile form.
     */
    public function profilUser(Request $request): View
    {
        return view('user.profile.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateUser(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
    
    $data = $request->validated();

    if (empty($data['password'])) {
        unset($data['password']);
    } else {
        $data['password'] = Hash::make($data['password']);
    }

    $user->fill($data);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

        return Redirect::route('user.profile')->with('status', 'profile-updated');
    }

        public function profilAdmin(Request $request): View
    {
        return view('admin.auth.profil', [
            'user' => $request->user(),
        ]);
    }

    public function updateAdmin(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();
    
    $data = $request->validated();

    if (empty($data['password'])) {
        unset($data['password']);
    } else {
        $data['password'] = Hash::make($data['password']);
    }

    $user->fill($data);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.admin')->with('status', 'profile-updated');
}
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
