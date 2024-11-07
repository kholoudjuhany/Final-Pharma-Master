@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <h1 class="mt-4">Medicines Table</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Medicines</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Medicines Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Medicine ID</th>
                            <th>Medicine Name</th>
                            <th>Medicine Price</th>
                            <th>Medicine Image</th>
                            <th>Medicine Quantity</th>
                            <th>Medicine's Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meds as $med)
                        <tr>
                            <td>{{ $med->id }}</td>
                            <td>{{ $med->med_name }}</td>
                            <td>{{ $med->med_price }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $med->med_img) }}" alt="{{ $med->med_name }}" style="width: 50px; height: auto;">
                            </td>
                            <td>{{ $med->med_quantity  }}</td>
                            <td>{{ $med->category ? $med->category->cat_name : 'No Category' }}</td>
                            <td>
                                <a href="{{ route('medicines.edit', $med->id) }}" class="btn btn-primary">Edit</a>
                                <!-- Delete Button with Modal Trigger -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteFormAction('{{ route('medicines.destroy', $med->id) }}')">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="mt-3">
                    <a href="{{ route('medicines.create') }}" class="btn btn-success">Add New Medicine</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal -->
@include('dashboard.deleteAlert')
@endsection

