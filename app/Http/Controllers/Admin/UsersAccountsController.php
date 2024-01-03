<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::orderBy('id', 'desc')->get();
        return view('v_backend.admin.users_accounts.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'roles' => 'required|in:1,2',
            ],
            [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'password.required' => 'The password field is required.',
                'roles.in' => 'Invalid role selected.',
            ],
        );

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->roles = $request->input('roles');
        $user->save();

        return redirect()
            ->back()
            ->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = User::find($id);
        return view('v_backend.admin.users_accounts.edit', [
            'data' => $datas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'roles' => 'required|in:1,2',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->back()
                ->with('error', 'User not found.');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->roles = $request->input('roles');
        $user->save();
        return redirect('/users_accounts')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->back()
                ->with('error', 'User not found.');
        }
        try {
            $user->delete();
            return redirect('/users_accounts')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Ada Kesalahan dalam proses delete data !!.');
        }
    }
}