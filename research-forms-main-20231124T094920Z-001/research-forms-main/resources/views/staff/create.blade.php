@extends('layouts.app')

@section('content')
    <div class="p-3 bg-white">
        <h2 class="h4 mb-4 font-weight-bold">New Staff</h2>

        <form action="{{ route('staff.store') }}" method="post">
            @csrf

            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="adviser" name="role" value="adviser" checked />
                    <label class="form-check-label" for="adviser">Adviser</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="librarian" name="role" value="librarian" />
                    <label class="form-check-label" for="librarian">Librarian</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" autofocus required />
                </div>

                <div class="col">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" class="form-control" />
                </div>

                <div class="col">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required />
                </div>
            </div>

            <div class="form-group">
                <label for="employee_id">Employee ID</label>
                <input type="text" name="employee_id" id="employee_id" class="form-control" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
            </div>

            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
@endsection
