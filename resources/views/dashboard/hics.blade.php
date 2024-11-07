@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <h1 class="mt-4">Health Insurance Companies Table</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Health Insurance Companies</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                HIC Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>HIC Name</th>
                            <th>HIC Disscount</th>
                            <th>HIC Email</th>
                            <th>HIC Mobile</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hics as $hic)
                        <tr>
                            <td>{{ $hic->HIC_name }}</td>
                            <td>{{ $hic->HIC_disscount }}</td>
                            <td>{{ $hic->HIC_email }}</td>
                            <td>{{ $hic->HIC_mobile }}</td>
                            <td>
                                <a href="{{ route('hics.edit', $hic->id) }}" class="btn btn-primary">Edit</a>
                                <!-- Delete Button with Modal Trigger -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteFormAction('{{ route('hics.destroy', $hic->id) }}')">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Add New HIC Button -->
                <div class="mt-3">
                    <a href="{{ route('hics.create') }}" class="btn btn-success">Add New HIC</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal -->
@include('dashboard.deleteAlert')
@endsection
