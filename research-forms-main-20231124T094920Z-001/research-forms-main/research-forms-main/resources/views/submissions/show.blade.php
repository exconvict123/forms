@extends('layouts.app')

@section('content')
    <div class="p-3 bg-white">
        <div class="d-flex flex-column flex-md-row align-md-items-center justify-content-md-between">
            <div>
                <h2 class="h4 mb-2 font-weight-bold">
                    {{ $researchForm->title }}
                </h2>
                <p class="text-muted mb-1">
                    Leader: {{ $student->user->full_name }}
                </p>
                <p class="text-muted mb-1">
                    <span>Status:</span>
                    @if (isset($submission))
                        @switch ($submission->status)
                            @case ('pending')
                                <span class="text-warning">Pending</span>
                            @break

                            @case ('approved')
                                <span class="text-success">Approved</span>
                            @break

                            @case ('rejected')
                                <span class="text-danger">Rejected</span>
                            @break
                        @endswitch
                    @endif
                </p>
                <p class="text-muted mb-2">
                    Adviser: {{ $student->adviser->full_name }}
                </p>
            </div>

            @if (isset($submission))
                <form action="{{ route('submissions.change-status', $submission->id) }}" method="post">
                    @csrf

                    <label for="status">Status</label>
                    <select name="status" id="status" class="custom-select">
                        <option value="" selected>Select option</option>
                        <option value="approved" {{ $submission->status !== 'approved' ?: 'selected' }}>
                            Approve
                        </option>

                        <option value="rejected" {{ $submission->status !== 'rejected' ?: 'selected' }}>
                            Reject
                        </option>
                    </select>
                    <button type="submit" class="btn mt-2 btn-primary">Submit</button>
                </form>
            @endif
        </div>

        @if (isset($submission))
            <a href="{{ $uri }}" class="btn mt-3 btn-primary">
                Download Document
            </a>
            <iframe src="{{ $uri }}" width="100%" height="600" class="mt-2"></iframe>
        @else
            <p>This student has not yet made any submissions.</p>
        @endif
    </div>
@endsection

