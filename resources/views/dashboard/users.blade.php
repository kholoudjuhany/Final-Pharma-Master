@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <h1 class="mt-4">Users Table</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Personal ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>HIC Name</th>
                            <th>User Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->personal_id }}</td>
                            <td>{{ $user->Fname }}</td>
                            <td>{{ $user->Lname }}</td>
                            <td>{{ $user->DoB }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user_mobile }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->hic->HIC_name }}</td>
                            <td>{{ $user->user_role }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteFormAction('{{ route('users.destroy', $user->id) }}')">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
       
<!-- Bootstrap Modal -->
@include('dashboard.deleteAlert')
@endsection

