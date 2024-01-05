<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
     /**
     * Index Accounts
     */
    public function index()
    {
        $user_profile = auth()->user()->id;
        $datas = User::find($user_profile);
        return view('v_backend.users.accounts', [
            'data' => $datas,
        ]);
    }


    /**
     * Update accounts.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
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
        $user->roles = auth()->user()->roles;
        $user->save();
        return redirect('/accounts')->with('success', 'User updated successfully!');
    }
  
}
