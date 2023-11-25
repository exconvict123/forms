@extends('layouts.app')

@section('content')
    <div class="p-3 bg-white">
        <h2 class="h4 mb-4 font-weight-bold">Update Student Information</h2>

        <form action="{{ route('students.update', $student) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <label for="first_name">First Name</label>
                    <input
                        type="text"
                        name="first_name"
                        id="first_name"
                        class="form-control @error('first_name') is-invalid @enderror"
                        value="{{ $student->user->first_name }}"
                        autofocus
                        required
                    />

                    @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <label for="middle_name">Middle Name</label>
                    <input
                        type="text"
                        name="middle_name"
                        id="middle_name"
                        class="form-control @error('middle_name') is-invalid @enderror"
                        value="{{ $student->user->middle_name }}"
                    />

                    @error('middle_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 col-md-4">
                    <label for="last_name">Last Name</label>
                    <input
                        type="text"
                        name="last_name"
                        id="last_name"
                        class="form-control @error('last_name') is-invalid @enderror"
                        value="{{ $student->user->last_name }}"
                        required
                    />

                    @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-4">
                    <label for="student_id">Student ID</label>
                    <input
                        type="text"
                        name="student_id"
                        id="student_id"
                        class="form-control @error('student_id') is-invalid @enderror"
                        value="{{ $student->user->username }}"
                        required
                    />

                    @error('student_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 col-md-4">
                    <label for="adviser">Adviser</label>
                    <input
                        type="text"
                        name="adviser"
                        id="adviser"
                        class="form-control @error('adviser') is-invalid @enderror"
                        value="{{ $student->adviser }}"
                        required
                    />

                    @error('adviser')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <label for="department">Department</label>
                    <input
                        type="text"
                        name="department"
                        id="department"
                        class="form-control @error('department') is-invalid @enderror"
                        value="{{ $student->department }}"
                        required
                    />

                    @error('department')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <label for="course">Course</label>
                    <input
                        type="text"
                        name="course"
                        id="course"
                        class="form-control @error('course') is-invalid @enderror"
                        value="{{ $student->course }}"
                        required
                    />

                    @error('course')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 col-md-4">
                    <label for="year_level">Year Level</label>
                    <select name="year_level" id="year_level" class="custom-select @error('year_level') is-invalid @enderror">
                        <option>Select option</option>
                        <option
                            value="1st Year"
                            {{ ($student->year_level === "1st Year") ? 'selected' : '' }}
                        >
                            1st Year
                        </option>
                        <option
                            value="2nd Year"
                            {{ ($student->year_level === "2nd Year") ? 'selected' : '' }}
                        >
                            2nd Year
                        </option>
                        <option
                            value="3rd Year"
                            {{ ($student->year_level === "3rd Year") ? 'selected' : '' }}
                        >
                            3rd Year
                        </option>
                        <option
                            value="4th Year"
                            {{ ($student->year_level === "4th Year") ? 'selected' : '' }}
                        >
                            4th Year
                        </option>
                    </select>

                    @error('year_level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn px-4 btn-primary">
                Save
            </button>
        </form>
    </div>

    <div class="mt-3 p-3 bg-white">
        <h2 class="h4 mb-4 font-weight-bold">Reset Password</h2>

        <form action="{{ route('reset-password') }}" method="post">
            @csrf

            <input type="hidden" name="user_id" value="{{ $student->user->id }}" />

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
