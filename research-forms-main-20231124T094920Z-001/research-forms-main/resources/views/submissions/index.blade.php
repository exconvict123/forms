@extends('layouts.app')

@section('content')
    <div class="p-3 shadow-sm bg-white">
        <h2 class="h4 mb-2 font-weight-bold">Research Forms</h2>
        <p class="text-muted mb-4">Form Title: {{ $title }}</p>

        <div class="col-md-4 p-0 mb-3">
            <select class="custom-select" id="select-form">
                <option value="">Select form</option>
                @foreach ($researchForms as $researchForm)
                    <option value="{{ $researchForm->id }}">
                        {{ $researchForm->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="table-responsive">
            <table class="table table-sm table-striped" id="table">
                <thead>
                    <tr>
                        <th>Leader Name</th>
                        <th>Adviser</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>
                                <a href="{{ route('research-forms.submissions.show', [
                                        'student' => $student,
                                        'research_form' => request()->query('formId', 1),
                                    ]) }}">
                                    {{ $student->user->full_name }}
                                </a>
                            </td>
                            <td>
                                {{ $student->adviser }}
                            </td>
                            <td>
                                {{
                                    \Carbon\Carbon::parse(
                                        $student->submissions
                                            ->where('research_form_id', request()->query('formId', 1))
                                            ->first()->value('created_at')
                                    )->toDayDateTimeString()
                                }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
