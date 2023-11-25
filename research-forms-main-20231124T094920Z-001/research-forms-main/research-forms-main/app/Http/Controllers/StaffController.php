<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    public function index(): View
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['adviser', 'librarian']);
        })->get();

        return view('staff.index', ['users' => $users]);
    }

    public function create(): View
    {
        return view('staff.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'employee_id' => 'required|string|unique:users,username',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'password' => 'required|confirmed|string',
            'role' => ['required', Rule::in(['adviser', 'librarian'])],
        ]);

        $user = User::create([
            'username' => $request->employee_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->input('middle_name', ''),
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect(route('staff.index'));
    }

    public function edit(User $staff): View
    {
        return view('staff.edit', ['user' => $staff]);
    }

    public function update(Request $request, User $staff): RedirectResponse
    {
        $request->validate([
            'employee_id' => [
                'required',
                'string',
                Rule::unique('users', 'username')->ignore($staff),
            ],
            'first_name' => 'required|string',
            'middle_name' => 'sometimes|required|string',
            'last_name' => 'required|string',
            'role' => ['required', Rule::in(['adviser', 'librarian'])],
        ]);

        $staff->update($request->except('role'));

        $staff->syncRoles([$request->role]);

        return redirect(route('staff.index'))
            ->with('message', 'Staff information udpated successfully.');
    }
}
