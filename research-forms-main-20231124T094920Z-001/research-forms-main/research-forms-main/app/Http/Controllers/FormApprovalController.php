<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\RedirectResponse;

class FormApprovalController extends Controller
{
    public function __invoke(Submission $submission): RedirectResponse
    {
        $submission->update(['is_approved' => ! $submission->is_approved]);

        return redirect(route('research-forms.submissions.index'));
    }
}
