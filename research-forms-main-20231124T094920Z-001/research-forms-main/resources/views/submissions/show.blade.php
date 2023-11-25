@extends('layouts.app')

@section('content')
    <div class="p-3 bg-white">
        <h2 class="h4 mb-2 font-weight-bold">
            {{ $submission->title }}
        </h2>
        <p class="text-muted mb-1">
            Leader: {{ $submission->last_name }}, {{ $submission->first_name }} {{ $submission->middle_name }}
        </p>
        <p class="text-muted mb-4">
            Adviser: {{ $submission->adviser }}
        </p>

        <iframe src="{{ $uri }}"
            width="600px"
            height="400px"
        ></iframe>

        <div class="mt-3">
            <a href="{{ $uri }}" class="btn btn-primary">
                Download Document
            </a>
        </div>
    </div>
@endsection
