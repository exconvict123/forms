<?php

namespace App\Http\Controllers;

use App\Enums\YearLevel;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'sometimes|required|string',
            'last_name' => 'required|string',
            'department' => 'required|string',
            'course' => 'required|string',
            'year_level' => ['required', Rule::in(array_column(YearLevel::cases(), 'value'))],
            'student_id' => 'required|unique:users,username',
            'adviser' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->input('middle_name', ''),
            'last_name' => $request->last_name,
            'username' => $request->student_id,
            'password' => Hash::make($request->password),
        ]);

        $student = new Student([
            'department' => $request->department,
            'course' => $request->course,
            'year_level' => $request->enum('year_level', YearLevel::class),
            'adviser' => $request->adviser,
        ]);

        $student->user()->associate($user)->save();

        $student->user->assignRole('student');

        return redirect(RouteServiceProvider::HOME);
    }
}
