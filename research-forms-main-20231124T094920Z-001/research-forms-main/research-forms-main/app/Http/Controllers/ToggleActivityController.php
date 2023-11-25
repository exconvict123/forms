<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ToggleActivityController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->user_id);

        $user->update([
            'is_active' => ! $user->is_active,
        ]);

        return redirect(route('students.index'));
    }
}
