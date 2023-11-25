<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubmissionStatusController extends Controller
{
    public function __invoke(Request $request, Submission $submission): RedirectResponse
    {
        $request->validate([
            'status' => ['required', Rule::in(['approved', 'rejected'])]
        ]);

        $submission->update($request->only('status'));

        return redirect(route('research-forms.submissions.show', [
            'student' => $submission->student->id,
            'research_form' => $submission->researchForm->id
        ]));
    }
}
