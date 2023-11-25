@extends('layouts.app')

@section('content')
    <div class="p-3 bg-white">
        <h2 class="h4 mb-4 font-weight-bold">Update Staff Information</h2>

        <form action="{{ route('staff.update', $user) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        id="adviser"
                        name="role"
                        value="adviser"
                        @if ($user->hasRole('adviser')) checked @endif
                    />
                    <label class="form-check-label" for="adviser">Adviser</label>
                </div>
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        id="librarian"
                        name="role"
                        value="librarian"
                        @if ($user->hasRole('librarian')) checked @endif
                    />
                    <label class="form-check-label" for="librarian">Librarian</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="first_name">First Name</label>
                    <input
                        type="text"
                        name="first_name"
                        id="first_name"
                        class="form-control"
                        value="{{ $user->first_name }}"
                        autofocus
                        required
                    />
                </div>

                <div class="col">
                    <label for="middle_name">Middle Name</label>
                    <input
                        type="text"
                        name="middle_name"
                        id="middle_name"
                        class="form-control"
                        value="{{ $user->middle_name }}"
                    />
                </div>

                <div class="col">
                    <label for="last_name">Last Name</label>
                    <input
                        type="text"
                        name="last_name"
                        id="last_name"
                        class="form-control"
                        value="{{ $user->last_name }}"
                        required
                    />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-8">
                    <label for="employee_id">Employee ID</label>
                    <input
                        type="text"
                        name="employee_id"
                        id="employee_id"
                        class="form-control"
                        value="{{ $user->username }}"
                    />
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </form>
    </div>

    <div class="mt-3 p-3 bg-white">
        <h2 class="h4 mb-4 font-weight-bold">Reset Password</h2>

        <form action="{{ route('reset-password') }}" method="post">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}" />

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
            </div>

            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
    </div>
@endsection
