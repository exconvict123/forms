<?php

namespace App\Http\Controllers;

use App\Models\ResearchForm;
use App\Models\Student;
use Illuminate\Contracts\View\View;

class ResearchFormController extends Controller
{
    public function index(): View
    {
        $studentId = Student::where('user_id', request()->user()->id)->value('id');

        $forms = ResearchForm::with(['submissions' => function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        }])->get();

        $forms->each(function ($form) {
            $form->submitted = $form->submissions->isNotEmpty();
        });

        return view('research-forms.index', [
            'researchForms' => $forms,
        ]);
    }
}
