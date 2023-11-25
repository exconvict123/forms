<?php

namespace App\Http\Controllers;

use App\Enums\YearLevel;
use App\Models\Course;
use App\Models\Department;
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
        return view('register', [
            'departments' => Department::all(),
            'courses' => Course::all(),
            'advisers' => User::whereHas('roles', function ($query) {
                $query->where('name', 'adviser');
            })->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'sometimes',
            'last_name' => 'required|string',
            'department' => 'required|exists:departments,id',
            'course' => 'required|exists:courses,id',
            'year_level' => ['required', Rule::in(array_column(YearLevel::cases(), 'value'))],
            'student_id' => 'required|unique:users,username',
            'adviser' => 'required|exists:users,id',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->input('middle_name', ''),
            'last_name' => $request->last_name,
            'username' => $request->student_id,
            'password' => Hash::make($request->password),
        ]);

        $department = Department::find($request->department);
        $course = Course::find($request->course);
        $adviser = User::find($request->adviser);

        $student = new Student([
            'year_level' => $request->enum('year_level', YearLevel::class),
        ]);

        $student->department()->associate($department);
        $student->course()->associate($course);
        $student->adviser()->associate($adviser);
        $student->user()->associate($user)->save();

        $student->user->assignRole('student');

        return redirect(RouteServiceProvider::HOME);
    }
}
