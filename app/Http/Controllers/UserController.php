<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\Dni;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employees.index', ['users' => User::getAllUserIndex()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => ['required', new Dni],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'dni' => $request->dni,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect(RouteServiceProvider::USER);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('employees.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('employees.edit', ['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'boolean'],
        ];
        $user->name = $request->name;
        $user->is_admin = $request->type;
        if ($user->dni !== $request->dni) {
            $rules['dni'] = ['required', new Dni];
            $user->dni = $request->dni;
        }
        if ($user->email !== $request->email) {
            $rules['email'] = ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class];
            $user->email = $request->email;
        }

        $request->validate($rules);
        $user->save();
        return redirect(RouteServiceProvider::USER);
    }
    public function newPassword(Request $request, string $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(RouteServiceProvider::USER);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return redirect(RouteServiceProvider::USER);
    }
}
