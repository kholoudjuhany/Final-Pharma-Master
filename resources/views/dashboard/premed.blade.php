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
                Prescription Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Prescription ID</th>
                            <th>User Name</th> <!-- Add User Name Column -->
                            <th>Medicines</th>
                            <th>Total Price (with Discount)</th>
                            <th>Status</th> <!-- Add Status Column -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $prescription)
                        <tr>
                            <td>{{ $prescription['pre_id'] }}</td>
                            <td>{{ $prescription['user_name'] }}</td> <!-- Display User Name -->
                            <td>{{ $prescription['medicines'] }}</td>
                            <td>${{ number_format($prescription['total_price'], 2) }}</td>
                            <td>{{ ucfirst($prescription['status']) }}</td> <!-- Display Status -->
                            <td>
                                <form action="{{ route('orders.send', $prescription['pre_id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Send to Customer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal for Deleting -->
@include('dashboard.deleteAlert')
@endsection
