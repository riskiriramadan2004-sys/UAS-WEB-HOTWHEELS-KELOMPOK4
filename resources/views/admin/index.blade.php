@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Users Management</h2>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>

            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No Users Found
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection