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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->user->username }}</td>
                            <td>{{ $student->user->full_name }}</td>
                            <td>{{ $student->department->name }}</td>
                            <td>{{ $student->course->name }}</td>
                            <td>{{ $student->year_level }}</td>
                            <td class="{{ $student->user->is_active ? 'text-success' : 'text-danger' }}">
                                {{ $student->user->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('students.edit', $student) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

