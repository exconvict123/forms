<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Submission;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        $staffCount = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['adviser', 'librarian']);
        })->count();

        return view('home', [
            'studentCount' => Student::count(),
            'submissionCount' => Submission::count(),
            'staffCount' => $staffCount,
        ]);
    }
}
