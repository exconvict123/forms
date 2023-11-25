@extends('layouts.app')

@section('content')
    <div class="p-3 bg-white">
        <div class="d-flex mb-4 align-items-center justify-content-between">
            <h2 class="h4 mb-0 font-weight-bold">Staff Management</h2>

            <a href="{{ route('staff.create') }}" class="btn btn-primary">
                New Staff
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-sm table-striped" id="table">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Full Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>
                                {{ ucfirst($user->roles[0]->name) }}
                            </td>
                            <td>
                                <a href="{{ route('staff.edit', $user) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
