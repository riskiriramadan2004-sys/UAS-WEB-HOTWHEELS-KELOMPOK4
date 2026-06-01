@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold text-white mb-1">
                👥 Users Management
            </h2>

            <p class="text-secondary mb-0">
                Manage registered users in Hot Wheels Store
            </p>
        </div>

        <div class="badge bg-warning text-dark px-3 py-2">
            Total Users : {{ $users->count() }}
        </div>

    </div>

    <div class="card shadow-lg border-0 user-card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-dark table-hover align-middle mb-0">

                    <thead>

                        <tr>
                            <th width="80">ID</th>
                            <th>Username</th>
                            <th width="150">Role</th>
                            <th width="220">Created At</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                            <tr>

                                <td>
                                    <span class="badge bg-primary">
                                        #{{ $user->id }}
                                    </span>
                                </td>

                                <td>

                                    <div class="fw-bold">
                                        {{ $user->username }}
                                    </div>

                                </td>

                                <td>

                                    @if($user->role == 'admin')

                                        <span class="badge bg-danger">
                                            ADMIN
                                        </span>

                                    @else

                                        <span class="badge bg-success">
                                            USER
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y H:i') }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center py-5">

                                    <div class="text-secondary">

                                        <h5>No Users Found</h5>

                                        <p class="mb-0">
                                            There are currently no registered users.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<style>

.user-card{
    background: linear-gradient(
        135deg,
        rgba(255,255,255,.06),
        rgba(255,255,255,.02)
    );
    border-radius: 20px;
    backdrop-filter: blur(12px);
}

.table-dark{
    --bs-table-bg: transparent;
}

.table-dark thead th{
    color:#ffb347;
    border-bottom:1px solid rgba(255,255,255,.15);
}

.table-dark tbody tr{
    transition:.3s;
}

.table-dark tbody tr:hover{
    background:rgba(255,77,0,.12);
}

</style>

@endsection