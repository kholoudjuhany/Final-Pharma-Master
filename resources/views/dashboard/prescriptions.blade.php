@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <h1 class="mt-4">Prescriptions Table</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Prescriptions</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Prescriptions Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Prescription ID</th>
                            <th>Customer Name</th>
                            <th>Prescription Detail</th> <!-- This will now show the image -->
                            <th>Prescription Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prescriptions as $prescription)
                        <tr>
                            <td>{{ $prescription->id }}</td>
                            <td>{{ $prescription->user ? $prescription->user->Fname . ' ' . $prescription->user->Lname : 'No Users' }}</td>
                            <td>
                                @if ($prescription->pre_details) <!-- Check if the image path exists -->
                                <img src="{{ asset('storage/' . $prescription->pre_details) }}" alt="Prescription Image" style="width: 100px; height: auto;"> <!-- Adjust width as needed -->
                                @else
                                No Image
                                @endif
                            </td>
                            <td>{{ $prescription->status }}</td>
                            <td>
                                <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-primary">Edit</a>
                                <!-- Delete Button with Modal Trigger -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteFormAction('{{ route('prescriptions.destroy', $prescription->id) }}')">Delete</button>
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


