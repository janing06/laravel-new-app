<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)

    {
        $searchVal = $request->search;

        $users = User::where('name', 'LIKE', '%' . $searchVal . '%')->orderBy('created_at', 'desc')->paginate(6)->withQueryString();

        return view('user.index', compact('users', 'searchVal'));
    }

    public function showTable(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('id', '!=', Auth::id())->select('id', 'name', 'email', 'created_at');

            return DataTables::of($users)
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('F jS \of Y');
                })
                ->addColumn('action', 'user.table-buttons')
                // ->rawColumns(['action', 'created_at'])
                ->toJson();
        }
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

    public function destroy(Request $request, User $user)
    {

        if ($request->ajax()) {

            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted',

            ], Response::HTTP_OK);
        }


        $user->delete();

        Alert::toast('User successfully deleted!', 'success');

        return redirect()->route('users.index');
    }
}
