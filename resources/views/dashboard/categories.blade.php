@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <h1 class="mt-4">Categories Table</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Categories Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->cat_name }}</td>
                            <td>{{ $cat->cat_description }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-primary">Edit</a>
                                <!-- Delete Button with Modal Trigger -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteFormAction('{{ route('categories.destroy', $cat->id) }}')">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Add New HIC Button -->
                 <div class="mt-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-success">Add New Category</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal -->
@include('dashboard.deleteAlert')
@endsection
