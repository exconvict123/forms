<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::find($request->user_id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/home');
    }
}
