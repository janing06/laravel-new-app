<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)

    {
        $searchVal = $request->search;

        $users = User::where('name', 'LIKE', '%' . $searchVal . '%')->orderBy('created_at', 'desc')->paginate(6)->withQueryString();

        return view('user.index', compact('users', 'searchVal'));
    }

    public function create()

    {
        return view('user.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'latitude' => ['required', 'numeric', 'min:-90', 'max:90'],
            'longitude' => ['required', 'numeric', 'min:-180', 'max:180'],
        ]);



        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'latitude' => (string) $request->latitude,
            'longitude' => (string) $request->longitude,
        ]);

        Alert::toast('User Successfully Added', 'success');

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class . ',email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],

        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            'latitude' => (string) $request->latitude,
            'longitude' => (string) $request->longitude,
        ]);

        Alert::toast('User Successfully Updated', 'success');


        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {

        $user->delete();

        Alert::toast('User successfully deleted!', 'success');

        return redirect()->route('users.index');
    }
}
