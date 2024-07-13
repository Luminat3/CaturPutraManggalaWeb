<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{

    public function getUser()
    {
        return auth()->user();
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Creating user's profile information.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'nama' => 'Nama Tidak Boleh Kosong',
                'email' => 'Email Tidak Boleh Kosong',
                'password' => 'Password Tidak Boleh Kosong',
            ]
        );

        $user = $request->user();
        if ($user && $user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user['is_admin'] = $request->has('is_admin') ? 1 : 0;

        // if ($validatedData->user()->isDirty('email')) {
        //     $validatedData->user()->email_verified_at = null;
        // }

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return Redirect::route('user')->with('Success', 'User baru telah berhasil ditambahkan');
    }

    public function show (){
        /** @var \App\Models\User **/
        $session = $this->getUser();

        if(!$session || !$session->isAdmin())
        {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk melihat data user');
        }

        $user = User::all();
        return view('dashboard.create-user', ['user'=>$user]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    public function delete_user($id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('user')->with('success', "Pengguna Berhasil dihapus");
    }
}
