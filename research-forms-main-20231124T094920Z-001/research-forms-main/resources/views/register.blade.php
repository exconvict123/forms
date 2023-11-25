<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Research Forms</title>

    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            background: #e5e7eb;
        }

        .form-register {
            margin: auto;
            width: 100%;
            max-width: 48rem;
        }
    </style>
</head>
<body>
    <form action="{{ route('register') }}" method="post" class="form-register p-3 shadow bg-white">
        @csrf

        <div class="mb-3 text-center">
            <img src="{{ asset('application-logo.webp') }}" alt="Saint Michael College of Caraga" height="64" width="64" />
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" autofocus required />

                @error('first_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <label for="middle_name">Middle Name</label>
                <input type="text" name="middle_name" id="middle_name" class="form-control @error('middle_name') is-invalid @enderror" />

                @error('middle_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 col-md-4">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" required />

                @error('last_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <label for="student_id">Student ID</label>
                <input type="text" name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required />

                @error('student_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 col-md-6">
                <label for="adviser">Adviser</label>
                <input type="text" name="adviser" id="adviser" class="form-control @error('adviser') is-invalid @enderror" required />

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
                <input type="text" name="department" id="department" class="form-control @error('department') is-invalid @enderror" required />

                @error('department')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <label for="course">Course</label>
                <input type="text" name="course" id="course" class="form-control @error('course') is-invalid @enderror" required />

                @error('course')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 col-md-4">
                <label for="year_level">Year Level</label>
                <select name="year_level" id="year_level" class="custom-select @error('year_level') is-invalid @enderror">
                    <option selected>Select option</option>
                    @foreach (\App\Enums\YearLevel::cases() as $year_level)
                        <option value="{{ $year_level }}">{{ $year_level }}</option>
                    @endforeach
                </select>

                @error('year_level')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required />
            </div>

            <div class="col-12 col-md-6">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required />
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-between">
            <span class="small text-secondary">
                Already have an account? <a href="{{ route('welcome') }}">Login here</a>
            </span>

            <button type="submit" class="btn ml-2 px-4 btn-primary">
                Register
            </button>
        </div>
    </form>
</body>
</html>
