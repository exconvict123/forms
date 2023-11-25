<?php

namespace App\Http\Controllers;

use App\Models\ResearchForm;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        $researchForm = ResearchForm::find($request->input('formId', 1));

        return view('submissions.index', [
            'researchForm' => $researchForm,
            'students' => Student::all(),
            'researchForms' => ResearchForm::all(),
        ]);
    }

    public function create(ResearchForm $researchForm): View
    {
        return view('submissions.create', ['researchForm' => $researchForm]);
    }

    public function store(Request $request, ResearchForm $researchForm): RedirectResponse
    {
        $request->validate([
            'document' => 'required|file|mimetypes:application/pdf',
        ]);

        $file = $request->file('document');
        $path = $file->store('public');

        $student = DB::table('students')->where('user_id', $request->user()->id)->first();

        DB::table('submissions')->insert([
            'research_form_id' => $researchForm->id,
            'student_id' => $student->id,
            'original_filename' => $file->getClientOriginalName(),
            'path' => $path,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return redirect(route('research-forms.index'));
    }

    public function show(Student $student, ResearchForm $researchForm)
    {
        $submission = DB::table('submissions')
            ->select('submissions.id', 'submissions.path', 'submissions.status')
            ->where([
                'student_id' => $student->id,
                'research_form_id' => $researchForm->id,
            ])
            ->join('research_forms', 'research_form_id', '=', 'research_forms.id')
            ->join('students', 'student_id', '=', 'students.id')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->first();

        $uri = "";

        if (isset($submission)) {
            $uri = asset('storage/' . explode('/', $submission->path)[1]);
        }

        return view('submissions.show', [
            'researchForm' => $researchForm,
            'student' => $student,
            'submission' => $submission,
            'uri' => $uri,
        ]);
    }

    public function edit(ResearchForm $researchForm)
    {
        return view('submissions.edit', ['researchForm' => $researchForm]);
    }
}
