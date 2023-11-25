@extends('layouts.app')

@section('content')
    <div class="p-3 bg-white">
        <h2 class="h4 mb-4 font-weight-bold">Student Management</h2>

        <div class="table-responsive">
            <table class="table table-sm table-striped" id="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <td>{{ $student->user->username }}</td>
                        <td>{{ $student->user->full_name }}</td>
                        <td>{{ $student->department }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->year_level }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student) }}">Edit</a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
